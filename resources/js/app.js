/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

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

    $(".new-receiver").bind('click',function() {
        let count = $(".form-receiver").length;

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
            '                                    <div class="col-12">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="exampleInputEmail1">Шаблон</label>\n' +
            '                                            <input list="select_1" class="form-control" value="" name="selectTemplate_1" id="selectTemplate_1">\n' +
            '                                            <datalist id="select_1">\n' +
            '                                                <option value="ISO-8859-1">ISO-8859-1</option>\n' +
            '                                                <option value="cp1252">ANSI</option>\n' +
            '                                                <option value="utf8">UTF-8</option>\n' +
            '                                            </datalist>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12">\n' +
            '                                        <div class="custom-control custom-checkbox">\n' +
            '                                            <input type="checkbox" class="custom-control-input" id="customCheck" name="example1" checked="">\n' +
            '                                            <label class="custom-control-label" for="customCheck">Сохранить шаблон</label>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12">\n' +
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
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="exampleInputEmail1" class="text-secondary">Наименование</label>\n' +
            '                                            <input type="text" class="form-control" name="recName_1">\n' +
            '                                            <small id="region" class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="exampleInputEmail1" class="text-secondary">БИН</label>\n' +
            '                                            <input type="text" class="form-control" name="recBIN_1">\n' +
            '                                            <small id="region" class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="consignorCode1" class="text-secondary">Код заказчика</label>\n' +
            '                                            <input type="text" class="form-control" id="consignorCode1" name="consignorCode1">\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="country_1" class="text-secondary">Страна</label>\n' +
            '                                            <select class="form-control" id="country_1" name="country_1">\n' +
            '                                                <option>Казахстан</option>\n' +
            '                                                <option>Россия</option>\n' +
            '                                            </select>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="province_1" class="text-secondary">Область</label>\n' +
            '                                            <input type="text" class="form-control" name="province_1" id="province_1">\n' +
            '                                            <small class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="city_1" class="text-secondary">Город</label>\n' +
            '                                            <select class="form-control" name="city_1" id="city_1">\n' +
            '                                                <option>Алматы</option>\n' +
            '                                                <option>Астана</option>\n' +
            '                                            </select>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="post_index_1" class="text-secondary">Индекс</label>\n' +
            '                                            <input type="text" class="form-control" name="post_index_1" id="post_index_1">\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="street_1" class="text-secondary">Улица</label>\n' +
            '                                            <input type="text" class="form-control" name="street_1" id="street_1">\n' +
            '                                            <small id="region" class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="houseNumber_1" class="text-secondary">Дом</label>\n' +
            '                                            <input type="text" class="form-control" name="houseNumber_1" id="houseNumber_1">\n' +
            '                                            <small id="region" class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="officeNumber_1" class="text-secondary">Офис</label>\n' +
            '                                            <input type="text" class="form-control" name="officeNumber_1" id="officeNumber_1">\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="contactPerson_1" class="text-secondary">Контактное лицо</label>\n' +
            '                                            <input type="text" class="form-control" name="contactPerson_1" id="contactPerson_1">\n' +
            '                                            <small class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
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
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="places_1" class="text-secondary">К отправлению, мест</label>\n' +
            '                                            <input type="text" class="form-control" name="places_1" id="places_1">\n' +
            '                                            <small class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="weight_1" class="text-secondary">Вес, кг</label>\n' +
            '                                            <input type="text" class="form-control" name="weight_1" id="weight_1">\n' +
            '                                            <small class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
            '                                        <div class="form-group">\n' +
            '                                            <label for="volume_1" class="text-secondary">Объем, м3</label>\n' +
            '                                            <input type="text" class="form-control" name="volume_1" id="volume_1">\n' +
            '                                            <small class="form-text text-success">Обязательное поле.</small>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-12 col-sm-6 col-md-4">\n' +
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
            '                                                    <input type="radio" name="standard_1" id="standard_1" autocomplete="off">Экспресс\n' +
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
