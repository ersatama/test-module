@extends('layouts.main')
@section('content')
    <div class="container">
        <h1 class="mt-5">СКЛАДСКИЕ ЛОГИСТИЧЕСКИЕ УСЛУГИ</h1>
        <div class="services-description">Быстро. Качественно. В срок.</div>
        <div class="row mt-5 mb-5">
            <div class="col-12 col-lg-6">
                <div class="services-content-main">
                    <div class="services-content-main-item">
                        <div class="services-content-main-item-title">КОМПЛЕКСНОЕ СКЛАДСКОЕ РЕШЕНИЕ</div>
                        <div class="services-content-main-item-body">Кросс-докинг, адресное хранение, упаковка груза, возможность управлять запасами с помощью системы управления складом. </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="spark-logo">
                    <img src="/img/logo2.png">
                </div>
            </div>
        </div>
        @include('services.phone.phone')
    </div>
@endsection
