@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row min-vh-100 flex-column flex-md-row mt-4">
            <aside class="col-12 col-md-2 p-0 flex-shrink-1">
                @include('home.layouts.sidebar')
            </aside>
            <main class="col col-md-10 bg-faded py-3 flex-grow-1">
                <div class="container">
                    <h2>Поиск заказа</h2>
                    <h5>Результат поиска</h5>
                    <h6 class="text-bold">Фильтр</h6>
                    <router-view></router-view>
                    @if(sizeof($orders)>0)
                        @include('home.layouts.table', compact('orders', 'cityModel', 'deliverModel'))
                    @elseif (trim($query) !== '')
                        <div class="alert alert-primary mt-3" role="alert">
                            По вашему запросу ничего не найдено
                        </div>
                    @else
                        <div class="alert bg-secondary text-white mt-3" role="alert">
                            Отслеживайте статус заказа
                        </div>
                    @endif
                </div>
            </main>
        </div>
    </div>
@endsection
