@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row min-vh-100 flex-column flex-md-row mt-4">
            <aside class="col-12 col-md-2 p-0 flex-shrink-1">
                @include('home.layouts.sidebar')
            </aside>
            <main class="col col-md-10 bg-faded flex-grow-1">
                <div v-if="status">
                    <div class="container mb-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-3 mt-3 mb-2 bg-success text-white text-center">Ваш заказ успешно принят в обработку, с вами скоро свяжутся!<br>номер вашего заказа <span class="text-dark font-weight-bold">№@{{order}}</span></div>
                            </div>
                            <div class="col text-center mt-3">
                                <button type="button" class="btn btn-primary px-5" @click="refreshOrder()">Добавить новый заказ</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div class="container mb-5">
                        <h5>Добавить заказ</h5>
                        <h5 class="text-success">Отправитель</h5>
                        <form method="POST" action="/profile" onsubmit="return false;">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Шаблон</label>
                                        <input list="templates" class="form-control bg-light" id="template" data-value="{{join('_',[Auth::user()->iin,0,date('d-m-Y_H:i')])}}" value="" placeholder="{{join('_',[Auth::user()->iin,0,date('d-m-Y_H:i')])}}" aria-describedby="emailHelp" placeholder="Наименование" v-model="template" @change="changeTemplate">
                                        <datalist id="templates">
                                            @foreach ($templates as $template)
                                                <option value="{{$template['name']}}">
                                            @endforeach
                                        </datalist>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1" v-model="save">
                                        <label class="custom-control-label" for="customCheck">Сохранить шаблон</label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Наименование</label>
                                        <input type="text" autocomplete="none" class="form-control" value="{{Auth::user()->name}}" v-model="sender.name" readonly="true" id="sender_name">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">БИН</label>
                                        <input type="text" autocomplete="none" class="form-control" value="{{Auth::user()->iin}}" v-model="sender.iin" readonly="true" id="sender_iin">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Страна</label>
                                        <select class="form-control text-capitalize bg-light" id="sender_country" @change="changeCity" v-model="sender.country">
                                            @foreach($countries as $country)
                                                <option value="{{$country['id']}}">{{ucfirst($country['russian_name'])}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Область</label>
                                        <input type="text" class="form-control bg-light" v-model="sender.region" id="sender_region">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Город</label>
                                        <select class="form-control text-capitalize bg-light" id="sender_city" v-model="sender.city">
                                            <option v-for="city in cities" :value="city.id">@{{city.russian_name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Индекс</label>
                                        <input type="text" class="form-control bg-light" v-model="sender.index">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Улица</label>
                                        <input type="text" class="form-control bg-light" v-model="sender.street" id="sender_street">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Дом</label>
                                        <input type="text" class="form-control bg-light" v-model="sender.house" id="sender_house">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Офис</label>
                                        <input type="text" class="form-control bg-light" v-model="sender.office">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Контактное лицо</label>
                                        <input type="text" class="form-control bg-light" v-model="sender.person.name" id="sender_person_name">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Телефон</label>
                                        <input type="text" class="form-control bg-light" v-model="sender.person.phone" id="sender_person_phone">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Дата забора</label>
                                        <input type="date" class="form-control bg-light" v-model="sender.person.take_date" id="sender_person_take_date">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Время забора</label>
                                        <input type="text" class="form-control bg-light" v-model="sender.person.take_time" id="sender_person_take_time">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                            </div>
                            <div id="receiver-list">
                                <div v-bind:class="[receiver ? 'form-receiver mb-3 w-100' : 'd-none', '']" class="" v-for="(item,index) in receiver" :id="'form-receiver-'+index">
                                    <button class="btn btn-danger float-right btn-sm receiver-delete" @click="removeReceiver(index)"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                    <button class="btn btn-success float-right btn-sm mr-3 receiver-hide" @click="viewReceiver(index)"><i class="fas fa-chevron-down" aria-hidden="true"></i></button>
                                    <h5 class="text-success mt-1">Получатель @{{index+1}}</h5>
                                    <div class="view-block">
                                        <div class="row" id="receiver-0-body">
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Шаблон</label>
                                                    <input list="select_1" class="form-control" value="" name="selectTemplate_1" id="selectTemplate_1" v-model="receiver[index].template" @change="changeReceiverTemplate(index)">
                                                    <datalist id="select_1">
                                                        <option v-for="temp in templateList" :value="temp.name">@{{temp.name}}</option>
                                                    </datalist>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1" checked="" v-model="receiver[index].saveTemplate">
                                                    <label class="custom-control-label" for="customCheck">Сохранить шаблон</label>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group mt-4">
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="radio" id="exampleRadios1" value="0" checked v-model="receiver[index].type">
                                                      <label class="form-check-label" for="exampleRadios1">
                                                        Физическое лицо
                                                      </label>
                                                    </div>
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="radio" id="exampleRadios2" value="1" v-model="receiver[index].type">
                                                      <label class="form-check-label" for="exampleRadios2">
                                                        Юридическое лицо
                                                      </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="text-secondary">Наименование</label>
                                                    <input type="text" class="form-control" :id="'name-'+index" v-model="receiver[index].name">
                                                    <small class="form-text text-success">Обязательное поле.</small>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="text-secondary">БИН</label>
                                                    <input type="text" class="form-control" :id="'iin-'+index" v-model="receiver[index].iin">
                                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="consignorCode1" class="text-secondary">Код заказчика</label>
                                                    <input type="text" class="form-control" v-model="receiver[index].code">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="country_1" class="text-secondary">Страна</label>
                                                    <select class="form-control text-capitalize" @change="changeCityReceiver(index)" v-model="receiver[index].country">
                                                        <option v-for="(country,index) in receiver[index].countries" :value="country.id">@{{country.russian_name}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="province_1" class="text-secondary">Область</label>
                                                    <input type="text" class="form-control" :id="'region-'+index" v-model="receiver[index].region">
                                                    <small class="form-text text-success">Обязательное поле.</small>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="city_1" class="text-secondary">Город</label>
                                                    <select class="form-control text-capitalize" @change="changeCityReceiver(index)" v-model="receiver[index].city">
                                                        <option v-for="receiverCity in receiver[index].cities" :value="receiverCity.id">@{{receiverCity.russian_name}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="post_index_1" class="text-secondary">Индекс</label>
                                                    <input type="text" class="form-control" v-model="receiver[index].index">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="street_1" class="text-secondary">Улица</label>
                                                    <input type="text" class="form-control" :id="'street-'+index" v-model="receiver[index].street">
                                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="houseNumber_1" class="text-secondary">Дом</label>
                                                    <input type="text" class="form-control" :id="'house-'+index" v-model="receiver[index].house">
                                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="officeNumber_1" class="text-secondary">Офис</label>
                                                    <input type="text" class="form-control" v-model="receiver[index].office">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="contactPerson_1" class="text-secondary">Контактное лицо</label>
                                                    <input type="text" class="form-control" :id="'contact-person-name-'+index" v-model="receiver[index].contactPerson.name">
                                                    <small class="form-text text-success">Обязательное поле.</small>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="contact_phone_1" class="text-secondary">Телефон</label>
                                                    <input type="text" class="form-control" :id="'contact-person-phone-'+index" v-model="receiver[index].contactPerson.phone">
                                                    <small class="form-text text-success">Обязательное поле.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5 class="text-success mt-2 mb-3">Общая информация</h5>
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="places_1" class="text-secondary">К отправлению, мест</label>
                                                    <input type="text" class="form-control" :id="'contact-info-place-'+index" v-model="receiver[index].info.place">
                                                    <small class="form-text text-success">Обязательное поле.</small>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="weight_1" class="text-secondary">Вес, кг</label>
                                                    <input type="text" class="form-control" :id="'contact-info-weight-'+index" v-model="receiver[index].info.weight">
                                                    <small class="form-text text-success">Обязательное поле.</small>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="volume_1" class="text-secondary">Объем, м3</label>
                                                    <input type="text" class="form-control" :id="'contact-info-volume-'+index" v-model="receiver[index].info.volume">
                                                    <small class="form-text text-success">Обязательное поле.</small>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label class="text-secondary">Примечание</label>
                                                    <input type="text" class="form-control" v-model="receiver[index].info.annotation">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5 class="text-success mt-2 mb-3">Тип оплаты</h5>
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group mt-4">
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="radio" :id="'radio-payment-person-'+index" value="0" checked v-model="receiver[index].payment.personType">
                                                      <label class="form-check-label" :for="'radio-payment-person-'+index">
                                                        Отправителем
                                                      </label>
                                                    </div>
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="radio" :id="'radio-payment-person-1-'+index" value="1" v-model="receiver[index].payment.personType">
                                                      <label class="form-check-label" :for="'radio-payment-person-1-'+index">
                                                        Получателем
                                                      </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="payment_type_1">Способ оплаты</label>
                                                    <select class="form-control text-capitalize" name="payment_type_1" id="payment_type_1" v-model="receiver[index].payment.type">
                                                        <option v-for="(payment,paymentIndex) in receiver[index].payment.typeList" :value="paymentIndex">@{{payment}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5 class="text-success mt-2 mb-3">Тип доставки</h5>
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-md-4">
                                                <div class="form-group mt-3">

                                                    <div class="form-check">
                                                      <input class="form-check-input" type="radio" :id="'radio-payment-deliver-type-'+index" value="0" checked v-model="receiver[index].deliver.type">
                                                      <label class="form-check-label" :for="'radio-payment-deliver-type-'+index">
                                                        Стандарт
                                                      </label>
                                                    </div>
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="radio" :id="'radio-payment-deliver-type-1-'+index" value="1" v-model="receiver[index].deliver.type">
                                                      <label class="form-check-label" :for="'radio-payment-deliver-type-1-'+index">
                                                        Экспресс
                                                      </label>
                                                    </div>
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="radio" :id="'radio-payment-deliver-type-2-'+index" value="2" v-model="receiver[index].deliver.type">
                                                      <label class="form-check-label" :for="'radio-payment-deliver-type-2-'+index">
                                                        Ускоренная ЖД
                                                      </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label for="standard_1" class="text-secondary">Наложенный платеж</label>
                                                    <input type="text" class="form-control" v-model="receiver[index].deliver.payment">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label for="standard_1" class="text-secondary">Объявленная стоимость</label>
                                                    <input type="text" class="form-control" v-model="receiver[index].deliver.price">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--<receiver-card v-for="item in receiver"></receiver-card>-->
                            </div>
                            <div class="row justify-content-sm-center mb-3">
                                <div class="col-12 col-sm-5">
                                    <button type="submit" class="btn btn-primary btn-block mt-3 new-receiver" @click="newReceiver">Добавить получателя</button>
                                </div>
                            </div>
                            <div class="row justify-content-sm-center">
                                <div class="col-12 col-sm-5">
                                    <button type="submit" class="btn btn-success btn-block" @click="readyOrder">Добавить заказ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
