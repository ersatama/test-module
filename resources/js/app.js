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
    $(".new-receiver").bind('click', function() {
        alert();
    });
    $(".receiver-hide").bind('click', function(event) {
        event.preventDefault();

        $(this).toggleClass('reverse').closest('.form-receiver ').find('.view-block').fadeToggle(0);

    });

    $(".receiver-delete").bind('click', function(event) {
        event.preventDefault();

        $(this).closest('.form-receiver').remove();

    });

    $(".new-receiver").bind('click',function() {
        alert();

        /*

        <div class="form-receiver mb-3 w-100" id="receiver-1">
                            <button class="btn btn-danger float-right btn-sm receiver-delete">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="btn btn-success float-right btn-sm mr-3 receiver-hide reverse">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <h5 class="text-success mt-1">Получатель #1</h5>
                            <div class="view-block">
                                <div class="row" id="receiver-0-body">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Шаблон</label>
                                            <input list="select_1" class="form-control" value="" name="selectTemplate_1" id="selectTemplate_1">
                                            <datalist id="select_1">
                                                <option value="ISO-8859-1">ISO-8859-1</option>
                                                <option value="cp1252">ANSI</option>
                                                <option value="utf8">UTF-8</option>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck" name="example1" checked="">
                                            <label class="custom-control-label" for="customCheck">Сохранить шаблон</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mt-3">
                                            <div class="btn-group-vertical btn-block btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-success active">
                                                    <input type="radio" name="recType_1" id="option1" autocomplete="off" checked>Физическое лицо
                                                </label>
                                                <label class="btn btn-success">
                                                    <input type="radio" name="recType_1" id="option2" autocomplete="off">Юридическое лицо
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-secondary">Наименование</label>
                                            <input type="text" class="form-control" name="recName_1">
                                            <small id="region" class="form-text text-success">Обязательное поле.</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-secondary">БИН</label>
                                            <input type="text" class="form-control" name="recBIN_1">
                                            <small id="region" class="form-text text-success">Обязательное поле.</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="consignorCode1" class="text-secondary">Код заказчика</label>
                                            <input type="text" class="form-control" id="consignorCode1" name="consignorCode1">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="country_1" class="text-secondary">Страна</label>
                                            <select class="form-control" id="country_1" name="country_1">
                                                <option>Казахстан</option>
                                                <option>Россия</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="province_1" class="text-secondary">Область</label>
                                            <input type="text" class="form-control" name="province_1" id="province_1">
                                            <small class="form-text text-success">Обязательное поле.</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="city_1" class="text-secondary">Город</label>
                                            <select class="form-control" name="city_1" id="city_1">
                                                <option>Алматы</option>
                                                <option>Астана</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="post_index_1" class="text-secondary">Индекс</label>
                                            <input type="text" class="form-control" name="post_index_1" id="post_index_1">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="street_1" class="text-secondary">Улица</label>
                                            <input type="text" class="form-control" name="street_1" id="street_1">
                                            <small id="region" class="form-text text-success">Обязательное поле.</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="houseNumber_1" class="text-secondary">Дом</label>
                                            <input type="text" class="form-control" name="houseNumber_1" id="houseNumber_1">
                                            <small id="region" class="form-text text-success">Обязательное поле.</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="officeNumber_1" class="text-secondary">Офис</label>
                                            <input type="text" class="form-control" name="officeNumber_1" id="officeNumber_1">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="contactPerson_1" class="text-secondary">Контактное лицо</label>
                                            <input type="text" class="form-control" name="contactPerson_1" id="contactPerson_1">
                                            <small class="form-text text-success">Обязательное поле.</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="contact_phone_1" class="text-secondary">Телефон</label>
                                            <input type="text" class="form-control" name="contact_phone_1" id="contact_phone_1">
                                            <small class="form-text text-success">Обязательное поле.</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h5 class="text-success mt-2 mb-3">Общая информация</h5>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="places_1" class="text-secondary">К отправлению, мест</label>
                                            <input type="text" class="form-control" name="places_1" id="places_1">
                                            <small class="form-text text-success">Обязательное поле.</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="weight_1" class="text-secondary">Вес, кг</label>
                                            <input type="text" class="form-control" name="weight_1" id="weight_1">
                                            <small class="form-text text-success">Обязательное поле.</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="volume_1" class="text-secondary">Объем, м3</label>
                                            <input type="text" class="form-control" name="volume_1" id="volume_1">
                                            <small class="form-text text-success">Обязательное поле.</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="annotation_1" class="text-secondary">Примечание к отправке</label>
                                            <input type="text" class="form-control" id="annotation_1" name="annotation_1">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h5 class="text-success mt-2 mb-3">Тип оплаты</h5>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group mt-3">
                                            <div class="btn-group-vertical btn-block btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-success active">
                                                    <input type="radio" name="consignor_1" id="option1" autocomplete="off" checked>Отправителем
                                                </label>
                                                <label class="btn btn-success">
                                                    <input type="radio" name="consignor_1" id="option2" autocomplete="off">Получателем
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="payment_type_1">Способ оплаты</label>
                                            <select class="form-control" name="payment_type_1" id="payment_type_1">
                                                <option>Перечислением на счет</option>
                                                <option>Банковской картой</option>
                                                <option>Наличными</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h5 class="text-success mt-2 mb-3">Тип доставки</h5>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group mt-3">
                                            <div class="btn-group-vertical btn-block btn-group-toggle text-left" data-toggle="buttons">
                                                <label class="btn btn-success active text-left">
                                                    <input type="radio" name="standard_1" id=standard_1" autocomplete="off" checked>Стандарт
                                                </label>
                                                <label class="btn btn-success text-left">
                                                    <input type="radio" name="standard_1" id="standard_1" autocomplete="off">Экспресс
                                                </label>
                                                <label class="btn btn-success text-left">
                                                    <input type="radio" name="standard_1" id="standard_1" autocomplete="off">Ускоренная ЖД
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="standard_1" class="text-secondary">Наложенный платеж</label>
                                            <input type="text" class="form-control" name="standard_1" id="standard_1">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="standard_1" class="text-secondary">Объявленная стоимость</label>
                                            <input type="text" class="form-control" name="standard_1" id="standard_1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
         */
    });
});
