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
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{Auth::user()->name}}" aria-describedby="emailHelp" placeholder="Наименование" readonly="true">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">БИН</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{Auth::user()->iin}}" aria-describedby="emailHelp" placeholder="Наименование" readonly="true">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Страна</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Казахстан</option>
                                        <option>Россия</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Область</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="region">
                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Город</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Алматы</option>
                                        <option>Астана</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Индекс</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Улица</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Дом</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Офис</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Контактное лицо</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Телефон</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Дата забора</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Время забора</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <small id="region" class="form-text text-success">Обязательное поле.</small>
                                </div>
                            </div>
                        </div>
                        <div class="form-receiver mb-3 w-100">
                            <button class="btn btn-danger float-right btn-sm mt-n1">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="btn btn-success float-right btn-sm mt-n1 mr-2">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <h5 class="text-success mt-1">Получатель #1</h5>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <div class="btn-group-vertical btn-block btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-success active">
                                                <input type="radio" name="options" id="option1" autocomplete="off" checked>Физическое лицо
                                            </label>
                                            <label class="btn btn-success">
                                                <input type="radio" name="options" id="option2" autocomplete="off">Юридическое лицо
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">Наименование</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">БИН</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">Код заказчика</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">Страна</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Казахстан</option>
                                            <option>Россия</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">Область</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="region">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">Город</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Алматы</option>
                                            <option>Астана</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">Индекс</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">Улица</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">Дом</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">Офис</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">Контактное лицо</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">Телефон</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h5 class="text-success mt-2 mb-3">Общая информация</h5>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">К отправлению, мест</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">Вес, кг</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">Объем, м3</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <small id="region" class="form-text text-success">Обязательное поле.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">Примечание к отправке</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                                                <input type="radio" name="options" id="option1" autocomplete="off" checked>Отправителем
                                            </label>
                                            <label class="btn btn-success">
                                                <input type="radio" name="options" id="option2" autocomplete="off">Получателем
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Способ оплаты</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
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
                                                <input type="radio" name="options" id="option1" autocomplete="off" checked>Стандарт
                                            </label>
                                            <label class="btn btn-success text-left">
                                                <input type="radio" name="options" id="option2" autocomplete="off">Экспресс
                                            </label>
                                            <label class="btn btn-success text-left">
                                                <input type="radio" name="options" id="option2" autocomplete="off">Ускоренная ЖД
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">Наложенный платеж</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-secondary">Объявленная стоимость</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>
                            </div>
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
