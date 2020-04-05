@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row min-vh-100 flex-column flex-md-row mt-4">
            <aside class="col-12 col-md-2 p-0 flex-shrink-1">
                @include('home.layouts.sidebar')
            </aside>
            <main class="col col-md-10 bg-faded flex-grow-1 pt-3 mb-5">
                <h6 class="text-bold">Фильтр</h6>
                <router-view></router-view>
                @if (sizeof($order)>0)
                    <h2 class="bg-light align-self-auto text-dark p-3">Заказ по номеру #{{$ticket}}</h2>
                    <h5 class="mt-4">Информация об отправителе</h5>
                    <h6>Информация об отправителе</h6>
                    <div class="container-fluid bg-dark text-light p-3 mt-3">
                        <div class="row">
                            <div class="col-4 col-md-3">ID</div>
                            <div class="col-auto font-weight-bold">{{$order[0]['id']}}</div>
                        </div>
                        <hr class="bg-light">
                        <div class="row">
                            <div class="col-4 col-md-3">Ф.И.О</div>
                            <div class="col-auto font-weight-bold">{{$order[0]['name']}}</div>
                        </div>
                        <hr class="bg-light">
                        <div class="row">
                            <div class="col-4 col-md-3">БИН</div>
                            <div class="col-auto font-weight-bold">{{$order[0]['iin']}}</div>
                        </div>
                        <hr class="bg-light">
                        <div class="row">
                            <div class="col-4 col-md-3">Страна</div>
                            @php
                                $country = $countryModel->getCountryById($order[0]['country']);
                            @endphp
                            <div class="col-auto font-weight-bold">{{mb_convert_case($country['russian_name'], MB_CASE_UPPER, "UTF-8")}}</div>
                        </div>
                        <hr class="bg-light">
                        <div class="row">
                            <div class="col-4 col-md-3">Регион</div>
                            <div class="col-auto font-weight-bold">{{$order[0]['region']}}</div>
                        </div>
                        <hr class="bg-light">
                        <div class="row">
                            <div class="col-4 col-md-3">Город</div>
                            @php
                                $city = $cityModel->getCityById($order[0]['city']['id']);
                            @endphp
                            <div class="col-auto font-weight-bold">{{$city['russian_name']}}</div>
                        </div>
                        @if(trim($order[0]['index']) !== '')
                            <hr class="bg-light">
                            <div class="row">
                                <div class="col-4 col-md-3">Индекс</div>
                                <div class="col-auto font-weight-bold">{{$order[0]['index']}}</div>
                            </div>
                        @endif
                        @if(trim($order[0]['street']) !== '')
                            <hr class="bg-light">
                            <div class="row">
                                <div class="col-4 col-md-3">Улица</div>
                                <div class="col-auto font-weight-bold">{{$order[0]['street']}}</div>
                            </div>
                        @endif
                        @if(trim($order[0]['house']) !== '')
                            <hr class="bg-light">
                            <div class="row">
                                <div class="col-4 col-md-3">Дом</div>
                                <div class="col-auto font-weight-bold">{{$order[0]['house']}}</div>
                            </div>
                        @endif
                        @if(trim($order[0]['office']) !== '')
                            <hr class="bg-light">
                            <div class="row">
                                <div class="col-4 col-md-3">Офис</div>
                                <div class="col-auto font-weight-bold">{{$order[0]['office']}}</div>
                            </div>
                        @endif
                        @if(trim($order[0]['person_name']) !== '')
                            <hr class="bg-light">
                            <div class="row">
                                <div class="col-4 col-md-3">Получатель</div>
                                <div class="col-auto font-weight-bold">{{$order[0]['person_name']}}</div>
                            </div>
                        @endif
                        @if(trim($order[0]['person_phone']) !== '')
                            <hr class="bg-light">
                            <div class="row">
                                <div class="col-4 col-md-3">Телефон</div>
                                <div class="col-auto font-weight-bold">{{$order[0]['person_phone']}}</div>
                            </div>
                        @endif
                        @if(trim($order[0]['take_date']) !== '')
                            <hr class="bg-light">
                            <div class="row">
                                <div class="col-4 col-md-3">Дата забора</div>
                                <div class="col-auto font-weight-bold">{{$order[0]['take_date']}}</div>
                            </div>
                        @endif
                        @if(trim($order[0]['take_time']) !== '')
                            <hr class="bg-light">
                            <div class="row">
                                <div class="col-4 col-md-3">Время забора</div>
                                <div class="col-auto font-weight-bold">{{$order[0]['take_time']}}</div>
                            </div>
                        @endif
                    </div>
                    <h5 class="mt-5">Дополнительная информация</h5>
                    <h6>Информация о статусе, номере заказа, и накладной</h6>
                    @foreach($order[0]['invoice'] as $invoice)
                        <div class="container-fluid bg-dark text-light p-3 mt-3">
                            <div class="row">
                                <div class="col-4 col-md-3">Номер заказа</div>
                                <div class="col-auto font-weight-bold">{{$invoice['order_number']}}</div>
                            </div>
                            <hr class="bg-light">
                            <div class="row">
                                <div class="col-4 col-md-3">Номер накладной</div>
                                <div class="col-auto font-weight-bold">{{$invoice['invoice_number']}}</div>
                            </div>
                            <hr class="bg-light">
                            <div class="row">
                                <div class="col-4 col-md-3">Статус</div>
                                <div class="col-auto font-weight-bold">{{$invoice['invoice_status']}}</div>
                            </div>
                        </div>
                    @endforeach
                    <h5 class="mt-5">Получатели</h5>
                    <h6>Информация о получателях</h6>
                    @foreach($order[0]['receiver'] as $receiver)
                        <div class="container-fluid bg-dark text-light p-3 mt-3">
                            <div class="row">
                                <div class="col-4 col-md-3">Тип получателя</div>
                                <div class="col-auto font-weight-bold">{{$receiver['type']}}</div>
                            </div>
                            <hr class="bg-light">
                            <div class="row">
                                <div class="col-4 col-md-3">Ф.И.О</div>
                                <div class="col-auto font-weight-bold">{{$receiver['name']}}</div>
                            </div>
                            @if($receiver['type'] === 1)
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">БИН</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['iin']}}</div>
                                </div>
                            @endif
                            @if($receiver['code'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Код заказчика</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['code']}}</div>
                                </div>
                            @endif
                            @if($receiver['country'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Страна</div>
                                    @php
                                        $country = $countryModel->getCountryById($receiver['country']);
                                    @endphp
                                    <div class="col-auto font-weight-bold">{{mb_convert_case($country['russian_name'], MB_CASE_UPPER, "UTF-8")}}</div>
                                </div>
                            @endif
                            @if($receiver['region'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Регион</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['region']}}</div>
                                </div>
                            @endif
                            @if($receiver['city'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Город</div>
                                    @php
                                        $city = $cityModel->getCityById($receiver['city']);
                                    @endphp
                                    <div class="col-auto font-weight-bold">{{$city['russian_name']}}</div>
                                </div>
                            @endif
                            @if($receiver['index'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Индекс</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['index']}}</div>
                                </div>
                            @endif
                            @if($receiver['street'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Улица</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['street']}}</div>
                                </div>
                            @endif
                            @if($receiver['house'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Дом</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['house']}}</div>
                                </div>
                            @endif
                            @if($receiver['office'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Офис</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['office']}}</div>
                                </div>
                            @endif
                            @if($receiver['person_name'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Контактное лицо</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['person_name']}}</div>
                                </div>
                            @endif
                            @if($receiver['person_phone'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Телефон</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['person_phone']}}</div>
                                </div>
                            @endif
                            @if($receiver['place'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">К отправлению, мест</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['place']}}</div>
                                </div>
                            @endif
                            @if($receiver['weight'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Вес, кг</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['weight']}}</div>
                                </div>
                            @endif
                            @if($receiver['volume'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Объем, м3</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['volume']}}</div>
                                </div>
                            @endif
                            @if($receiver['annotation'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Примечание</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['annotation']}}</div>
                                </div>
                            @endif
                            @if($receiver['payment_person_type'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Тип оплаты</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['payment_person_type']}}</div>
                                </div>
                            @endif
                            @if($receiver['payment_type'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Способ оплаты</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['payment_type']}}</div>
                                </div>
                            @endif
                            <hr class="bg-light">
                            <div class="row">
                                <div class="col-4 col-md-3">Тип доставки</div>
                                @php
                                    $deliverData = $deliverModel->getTypeById($receiver['deliver_type']);
                                @endphp
                                <div class="col-auto font-weight-bold">{{$deliverData['russian_name']}}</div>
                            </div>
                            @if($receiver['deliver_payment'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Наложенный платеж</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['deliver_payment']}}</div>
                                </div>
                            @endif
                            @if($receiver['deliver_price'])
                                <hr class="bg-light">
                                <div class="row">
                                    <div class="col-4 col-md-3">Объявленная стоимость</div>
                                    <div class="col-auto font-weight-bold">{{$receiver['deliver_price']}}</div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else
                    <h2>Заказ по номеру #{{$ticket}} не найдена</h2>
                    <h5>Возможно заказ был удален или у вас нет доступа для просмотра информации об этом заказе</h5>
                @endif
            </main>
        </div>
    </div>
@endsection
