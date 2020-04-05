@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row min-vh-100 flex-column flex-md-row mt-4">
            <aside class="col-12 col-md-2 p-0 flex-shrink-1">
                @include('home.layouts.sidebar')
            </aside>
            <main class="col col-md-10 bg-faded py-3 flex-grow-1">
                <div class="container">
                    <h2>Здраствуите, {{Auth::user()->full_name}}</h2>
                    <h5>Список ваших заявок за последние 30 дней</h5>
                    <h6 class="text-bold">Фильтр</h6>
                    <router-view></router-view>
                    @if(sizeof($orders)>0)
                        @include('home.layouts.table', compact('orders', 'cityModel', 'deliverModel'))
                    @else
                        <div role="alert" class="alert alert-primary mt-3">
                            Вы ещё не делали заказов. <a href="/order" class="btn btn-primary stretched-link ml-3">Добавить заказ</a>
                        </div>
                    @endif

                    @includeWhen(($max!==0), 'home.layouts.pagination', ['page' => $page, 'max' => $max])
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
