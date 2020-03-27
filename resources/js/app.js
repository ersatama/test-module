/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

var token = $("meta[name='csrf-token']").attr("content");

require('./bootstrap');

window.Vue = require('vue');

const app = new Vue({
	el: '#app',
	data: {
		status: false,
		order: 0,
		cities: [],
		countries: [],
		template: '',
		save: true,
		senderTemplate: {
			name: '',
			iin: '',
			country: '',
			region: '',
			city: '',
			index: '',
			street: '',
			house: '',
			office: '',
			person: {
				name: '',
				phone: '',
				take_date: '',
				take_time: '',
			},
		},
		sender: {},
		templateList: [],
		receiverTemplate: {
			template: '',
			saveTemplate: false,
			type: 0,
			name: '',
			iin: '',
			code: '',
			countries: [],
			country: 1,
			region: '',
			cities: [],
			city: '',
			index: '',
			house: '',
			street: '',
			office: '',
			contactPerson: {
				name: '',
				phone: '',
			},
			info: {
				place: '',
				weight: '',
				volume: '',
				annotation: '',
			},
			payment: {
				personType: 0,
				typeList: ['Перечислением на счет','Банковской картой','Наличными'],
				type: 0,
			},
			deliver: {
				type: 0,
				payment: '',
				price: '',
			}
			
		},
		receiver: [],
		model: ''
	},
	created() {
		this.setValues();
		this.setSender();
	},
	mounted() {
		this.changeCity();
		this.getTemplateList();
		this.getCountries();
		this.receiverCity(1);
	},
	methods: {
		readyOrder() {
			if (this.sender.region.trim() === '') {
				return $("#sender_region").focus();
			} else if (this.sender.street.trim() === '') {
				return $("#sender_street").focus();
			} else if (this.sender.house.trim() === '') {
				return $("#sender_house").focus();
			} else if (this.sender.person.name.trim() === '') {
				return $("#sender_person_name").focus();
			} else if (this.sender.person.phone.trim() === '') {
				return $("#sender_person_phone").focus();
			} else if (this.sender.person.take_date.trim() === '') {
				return $("#sender_person_take_date").focus();
			} else if (this.sender.person.take_time.trim() === '') {
				return $("#sender_person_take_time").focus();
			}

			/*this.receiver.forEach(function callback(value, index) {
				if (value.name.trim() === '') {
					return $("#name-"+index).focus();
				} else if (value.iin.trim() === '') {
					return $("#iin-"+index).focus();
				} else if (value.region.trim() === '') {
					return $("#region-"+index).focus();
				} else if (value.street.trim() === '') {
					return $("#street-"+index).focus();
				} else if (value.contactPerson.name.trim() === '') {
					return $("#contact-person-name-"+index).focus();
				} else if (value.contactPerson.phone.trim() === '') {
					return $("#contact-person-phone-"+index).focus();
				} else if (value.info.place.trim() === '') {
					return $("#contact-info-place-"+index).focus();
				} else if (value.info.weight.trim() === '') {
					return $("#contact-info-weight-"+index).focus();
				} else if (value.info.volume.trim() === '') {
					return $("#contact-info-volume-"+index).focus();
				}
			});*/

			if (!this.template.trim()) {
				this.template = $("#template").data('value');
			}

			axios.post('/order/save', {
				template: {
					name: this.template,
					save: this.save,
				},
                sender: this.sender,
                receiver: this.receiver

            }).then(function (response) {
            	app.order = response.data;
                app.status = true;

            }).catch(function (error) {

                console.log(error);

            });


		},
		setValues() {
			this.senderTemplate.country = $("#sender_country").children("option:selected").val();
			this.senderTemplate.name = $("#sender_name").val().trim();
			this.senderTemplate.iin = $("#sender_iin").val().trim();
		},
		setSender() {
			this.sender = Object.assign({}, this.senderTemplate);
			this.receiver = [];
			this.changeCity();
			var date = new Date();
			var day = date.getDate();
			day = day<10 ? '0'+day : day;
			var month = date.getMonth()+1;
			month = month< 10 ? '0'+month: month;
			var hours = date.getHours();
			hours = hours< 10 ? '0'+hours: hours;
			var minutes = date.getMinutes();
			minutes = minutes< 10 ? '0'+minutes: minutes;
			var seconds = date.getSeconds();
			seconds = seconds<10 ? '0'+seconds: seconds;
			var dateTemp = this.senderTemplate.iin+'_0_'+day+'-'+month+'-'+date.getFullYear()+'_'+hours+':'+minutes+':'+seconds;
			$("#template").attr('placeholder',dateTemp).data('data-value',dateTemp);

		},
		refreshOrder() {

			this.template = '';
			this.save = true;
			this.status = false;
			this.getTemplateList();
			this.setSender();

		},
		receiverCity(id) {
			axios.get('order/city_list/'+id).then(response => (this.receiverTemplate.cities = response.data, this.receiverTemplate.city = this.receiverTemplate.cities[0].id));
			//this.receiverTemplate.city = this.receiverTemplate.cities[0].id;
		},
		changeCityReceiver(id) {
			axios.get('order/city_list/'+this.receiver[id].country).then(response => (this.receiver[id].cities = response.data,  this.receiver[id].city = this.receiver[id].cities[0].id));
		},
		show(a) {
			console.log(a);
		},
		newReceiver() {
			this.receiver.push(Object.assign({}, this.receiverTemplate));
			this.receiver[this.receiver.length - 1].cities = this.receiverTemplate.cities;
		},
		getCountries() {
			axios.get('order/countries').then(response => (this.countries = response.data, this.receiverTemplate.countries = response.data));
		},
		getTemplateList() {
			axios.get('order/template_list').then(response => (this.templateList = response.data));
		},
		removeReceiver(id) {
			this.receiver.splice(id,1);
		},
		viewReceiver(id) {
			$("#form-receiver-"+id).find('.receiver-hide').toggleClass('reverse').end().find('.view-block').fadeToggle(0);
		},
		changeCity() {
			axios.get('order/city_list/'+this.sender.country).then(response => (this.cities = response.data, this.sender.city = response.data[0].id));
		},
		changeTemplate() {
			axios.get('order/template/'+this.template).then(function(response) {
				app.sender = JSON.parse(response.data[0].data);
			});
		},

	}
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


$(document).ready(function() {
    AOS.init();

    $(".receiver-hide").bind('click', function(event) {
        event.preventDefault();

        $(this).toggleClass('reverse').closest('.form-receiver ').find('.view-block').fadeToggle(0);

    });

    $(".receiver-delete").bind('click', function(event) {
        event.preventDefault();

        $(this).closest('.form-receiver').remove();

    });

    $(".new-receiver").bind('blur',function(event) {
    	return;
    	event.preventDefault();
    	event.stopPropagation();
    	var count = 1;
    	count++;
        var count = $(".form-receiver").length;
        $("#receiver-list").append('<div class="form-receiver mb-3 w-100" id="receiver-">\n' +
            '                            <button class="btn btn-danger float-right btn-sm receiver-delete">\n' +
            '                                <i class="fas fa-trash"></i>\n' +
            '                            </button>\n' +
            '                            <button class="btn btn-success float-right btn-sm mr-3 receiver-hide reverse">\n' +
            '                                <i class="fas fa-chevron-down"></i>\n' +
            '                            </button>\n' +
            '                            <h5 class="text-success mt-1">Получатель</h5>\n' +
            '                            <div class="view-block">\n' +
            '                                <div class="row" id="receiver-0-body">\n' +
            '                                    <div class="col-12 col-sm-6">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="exampleInputEmail1">Шаблон</label>\n' +
            '                                            <input list="select_1" class="form-control" value="" name="selectTemplate_1" id="selectTemplate_1">\n' +
            '                                            <datalist id="select_1">\n' +
            '                                                <option value="ISO-8859-1">ISO-8859-1</option>\n' +
            '                                                <option value="cp1252">ANSI</option>\n' +
            '                                                <option value="utf8">UTF-8</option>\n' +
            '                                            </datalist>\n' +
            '                                        <div class="custom-control custom-checkbox">\n' +
            '                                            <input type="checkbox" class="custom-control-input" id="customCheck" name="example1" checked="">\n' +
            '                                            <label class="custom-control-label" for="customCheck">Сохранить шаблон</label>\n' +
            '                                        </div>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6">\n' +
            '                                        <div class="form-group mt-3">\n' +
            '                                            <div class="btn-group-vertical btn-block btn-group-toggle" data-toggle="buttons">\n' +
            '                                                <label class="btn btn-success active">\n' +
            '                                                    <input type="radio" name="recType_1" id="option1" autocomplete="off" checked>Физическое лицо\n' +
            '                                                </label>\n' +
            '                                                <label class="btn btn-success">\n' +
            '                                                    <input type="radio" name="recType_1" id="option2" autocomplete="off">Юридическое лицо\n' +
            '                                                </label>\n' +
            '                                            </div>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-3">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="exampleInputEmail1" class="text-secondary">Наименование</label>\n' +
            '                                            <input type="text" class="form-control" name="recName_1">\n' +
            '                                            <small id="region" class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-3">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="exampleInputEmail1" class="text-secondary">БИН</label>\n' +
            '                                            <input type="text" class="form-control" name="recBIN_1">\n' +
            '                                            <small id="region" class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-3">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="consignorCode1" class="text-secondary">Код заказчика</label>\n' +
            '                                            <input type="text" class="form-control" id="consignorCode1" name="consignorCode1">\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-3">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="country_1" class="text-secondary">Страна</label>\n' +
            '                                            <select class="form-control" id="country_1" name="country_1">\n' +
            '                                                <option>Казахстан</option>\n' +
            '                                                <option>Россия</option>\n' +
            '                                            </select>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-3">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="province_1" class="text-secondary">Область</label>\n' +
            '                                            <input type="text" class="form-control" name="province_1" id="province_1">\n' +
            '                                            <small class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-3">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="city_1" class="text-secondary">Город</label>\n' +
            '                                            <select class="form-control" name="city_1" id="city_1">\n' +
            '                                                <option>Алматы</option>\n' +
            '                                                <option>Астана</option>\n' +
            '                                            </select>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-3">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="post_index_1" class="text-secondary">Индекс</label>\n' +
            '                                            <input type="text" class="form-control" name="post_index_1" id="post_index_1">\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-3">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="street_1" class="text-secondary">Улица</label>\n' +
            '                                            <input type="text" class="form-control" name="street_1" id="street_1">\n' +
            '                                            <small id="region" class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-3">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="houseNumber_1" class="text-secondary">Дом</label>\n' +
            '                                            <input type="text" class="form-control" name="houseNumber_1" id="houseNumber_1">\n' +
            '                                            <small id="region" class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-3">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="officeNumber_1" class="text-secondary">Офис</label>\n' +
            '                                            <input type="text" class="form-control" name="officeNumber_1" id="officeNumber_1">\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-3">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="contactPerson_1" class="text-secondary">Контактное лицо</label>\n' +
            '                                            <input type="text" class="form-control" name="contactPerson_1" id="contactPerson_1">\n' +
            '                                            <small class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-3">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="contact_phone_1" class="text-secondary">Телефон</label>\n' +
            '                                            <input type="text" class="form-control" name="contact_phone_1" id="contact_phone_1">\n' +
            '                                            <small class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <hr>\n' +
            '                                <h5 class="text-success mt-2 mb-3">Общая информация</h5>\n' +
            '                                <div class="row">\n' +
            '                                    <div class="col-12 col-sm-6 col-md-3">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="places_1" class="text-secondary">К отправлению, мест</label>\n' +
            '                                            <input type="text" class="form-control" name="places_1" id="places_1">\n' +
            '                                            <small class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-3">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="weight_1" class="text-secondary">Вес, кг</label>\n' +
            '                                            <input type="text" class="form-control" name="weight_1" id="weight_1">\n' +
            '                                            <small class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-3">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="volume_1" class="text-secondary">Объем, м3</label>\n' +
            '                                            <input type="text" class="form-control" name="volume_1" id="volume_1">\n' +
            '                                            <small class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-3">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="annotation_1" class="text-secondary">Примечание к отправке</label>\n' +
            '                                            <input type="text" class="form-control" id="annotation_1" name="annotation_1">\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <hr>\n' +
            '                                <h5 class="text-success mt-2 mb-3">Тип оплаты</h5>\n' +
            '                                <div class="row">\n' +
            '                                    <div class="col-12 col-sm-6">\n' +
            '                                        <div class="form-group mt-3">\n' +
            '                                            <div class="btn-group-vertical btn-block btn-group-toggle" data-toggle="buttons">\n' +
            '                                                <label class="btn btn-success active">\n' +
            '                                                    <input type="radio" name="consignor_1" id="option1" autocomplete="off" checked>Отправителем\n' +
            '                                                </label>\n' +
            '                                                <label class="btn btn-success">\n' +
            '                                                    <input type="radio" name="consignor_1" id="option2" autocomplete="off">Получателем\n' +
            '                                                </label>\n' +
            '                                            </div>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="payment_type_1">Способ оплаты</label>\n' +
            '                                            <select class="form-control" name="payment_type_1" id="payment_type_1">\n' +
            '                                                <option>Перечислением на счет</option>\n' +
            '                                                <option>Банковской картой</option>\n' +
            '                                                <option>Наличными</option>\n' +
            '                                            </select>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <hr>\n' +
            '                                <h5 class="text-success mt-2 mb-3">Тип доставки</h5>\n' +
            '                                <div class="row">\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group mt-3">\n' +
            '                                            <div class="btn-group-vertical btn-block btn-group-toggle text-left" data-toggle="buttons">\n' +
            '                                                <label class="btn btn-success active text-left">\n' +
            '                                                    <input type="radio" name="standard_1" id=standard_1" autocomplete="off" checked>Стандарт\n' +
            '                                                </label>\n' +
            '                                                <label class="btn btn-success text-left">\n' +
            '                                                     <input type="radio" name="standard_1" id="standard_1" autocomplete="off">Экспресс\n' +
            '                                                </label>\n' +
            '                                                <label class="btn btn-success text-left">\n' +
            '                                                    <input type="radio" name="standard_1" id="standard_1" autocomplete="off">Ускоренная ЖД\n' +
            '                                                </label>\n' +
            '                                            </div>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="standard_1" class="text-secondary">Наложенный платеж</label>\n' +
            '                                            <input type="text" class="form-control" name="standard_1" id="standard_1">\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="standard_1" class="text-secondary">Объявленная стоимость</label>\n' +
            '                                            <input type="text" class="form-control" name="standard_1" id="standard_1">\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                            </div>\n' +
            '                        </div>');

        $(".receiver-hide").bind('click', function(event) {

            event.preventDefault();

            $(this).toggleClass('reverse').closest('.form-receiver ').find('.view-block').fadeToggle(0);

        });

        $(".receiver-delete").bind('click', function(event) {
            event.preventDefault();

            $(this).closest('.form-receiver').remove();

        });
    });
});