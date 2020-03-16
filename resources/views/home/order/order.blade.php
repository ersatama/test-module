@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row min-vh-100 flex-column flex-md-row mt-4">
            <aside class="col-12 col-md-2 p-0 flex-shrink-1">
                @include('home.layouts.sidebar')
            </aside>
            <main class="col col-md-10 bg-faded flex-grow-1">
                <div class="container mb-5">
                    <h5>Добавить заказ</h5>
                    <h5 class="text-success">Отправитель</h5>
                    <form method="POST" action="/profile" onsubmit="return false;">
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Шаблон</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{join('_',[Auth::user()->iin,0,date('d-m-Y_H:i')])}}" aria-describedby="emailHelp" placeholder="Наименование">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1" checked>
                                    <label class="custom-control-label" for="customCheck">Сохранить шаблон</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Наименование</label>
                                    <input type="text" autocomplete="none" class="form-control" value="{{Auth::user()->name}}" placeholder="Наименование" readonly="true" name="recName_consignor">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">БИН</label>
                                    <input type="text" autocomplete="none" class="form-control" value="{{Auth::user()->iin}}" placeholder="Наименование" readonly="true" name="recBIN_consignor">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Страна</label>
                                    <select class="form-control" name="country_consignor">
                                        <option>Казахстан</option>
                                        <option>Россия</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Область</label>
                                    <input type="text" class="form-control" name="province_consignor">
                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Город</label>
                                    <select class="form-control" value="city_consignor">
                                        <option>Алматы</option>
                                        <option>Астана</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Индекс</label>
                                    <input type="text" class="form-control" name="index_consignor">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Улица</label>
                                    <input type="text" class="form-control" name="street_consignor">
                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Дом</label>
                                    <input type="text" class="form-control" name="houseNumber_consignor">
                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Офис</label>
                                    <input type="text" class="form-control" name="officeNumber_consignor">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Контактное лицо</label>
                                    <input type="email" class="form-control" name="contactPerson_consignor">
                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Телефон</label>
                                    <input type="email" class="form-control" name="contact_phone_consignor">
                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Дата забора</label>
                                    <input type="date" class="form-control" name="takeDate_consignor">
                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Время забора</label>
                                    <input type="text" class="form-control" name="takeTime_consignor">
                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                </div>
                            </div>
                        </div>
                        <div id="receiver-list">

                        </div>
                        <div class="row justify-content-sm-center">
                            <div class="col-12 col-sm-5">
                                <button type="submit" class="btn btn-success btn-block">Добавить заказ</button>
                            </div>
                        </div>
                    </form>
                    <div class="row justify-content-sm-center">
                        <div class="col-12 col-sm-5">
                            <button type="submit" class="btn btn-primary btn-block mt-3 new-receiver">Добавить получателя</button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
