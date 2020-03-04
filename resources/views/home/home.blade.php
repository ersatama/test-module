@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row min-vh-100 flex-column flex-md-row mt-5">
            <aside class="col-12 col-md-2 p-0 flex-shrink-1">
                @include('home.layouts.sidebar')
            </aside>
            <main class="col col-md-10 bg-faded py-3 flex-grow-1">
                <div class="container">
                    <h2>Здраствуите, {{join(' ',[Auth::user()->name,Auth::user()->surname,Auth::user()->lastname])}}</h2>
                    <h5>Список ваших заявок за последние 30 дней</h5>
                    <div class="table-responsive">
                        <table class="table mt-3 table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Дата создания</th>
                                <th scope="col">Номер заказа</th>
                                <th scope="col">Номер накладной</th>
                                <th scope="col">Откуда</th>
                                <th scope="col">Куда</th>
                                <th scope="col">Тип доставки</th>
                                <th scope="col">Места</th>
                                <th scope="col">Вес (кг)</th>
                                <th scope="col">Обьем (м3)</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Примечание</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="col">Дата создания</th>
                                <td>Номер заказа</td>
                                <td>Номер накладной</td>
                                <td>Откуда</td>
                                <td>Куда</td>
                                <td>Тип доставки</td>
                                <td>Места</td>
                                <td>Вес (кг)</td>
                                <td>Обьем (м3)</td>
                                <td>Статус</td>
                                <td>Примечание</td>
                            </tr>
                            <tr>
                                <th scope="col">Дата создания</th>
                                <td>Номер заказа</td>
                                <td>Номер накладной</td>
                                <td>Откуда</td>
                                <td>Куда</td>
                                <td>Тип доставки</td>
                                <td>Места</td>
                                <td>Вес (кг)</td>
                                <td>Обьем (м3)</td>
                                <td>Статус</td>
                                <td>Примечание</td>
                            </tr>
                            <tr>
                                <th scope="col">Дата создания</th>
                                <td>Номер заказа</td>
                                <td>Номер накладной</td>
                                <td>Откуда</td>
                                <td>Куда</td>
                                <td>Тип доставки</td>
                                <td>Места</td>
                                <td>Вес (кг)</td>
                                <td>Обьем (м3)</td>
                                <td>Статус</td>
                                <td>Примечание</td>
                            </tr>
                            <tr>
                                <th scope="col">Дата создания</th>
                                <td>Номер заказа</td>
                                <td>Номер накладной</td>
                                <td>Откуда</td>
                                <td>Куда</td>
                                <td>Тип доставки</td>
                                <td>Места</td>
                                <td>Вес (кг)</td>
                                <td>Обьем (м3)</td>
                                <td>Статус</td>
                                <td>Примечание</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

@php
/*
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
*/
@endphp
@endsection