@extends('layouts.main')
@section('content')
    <div class="container">
        <h1 class="mt-5">ЭКСПРЕСС ДОСТАВКА</h1>
        <div class="services-description">Быстро. Качественно. В срок.</div>
        <div class="row mt-5 mb-5">
            <div class="col-12 col-lg-6">
                <div class="services-content-main">
                    <div class="services-content-main-item">
                        <div class="services-content-main-item-title">КУРЬЕРСКАЯ ПОЧТА.</div>
                        <div class="services-content-main-item-body">По территории Республики Казахстан Мы предлагаем услуги по доставке почтовых отправлений «от двери до двери» в 20 областных центров, 60 городов и 87 населенных пунктов. Срок доставки в основные областные центры республики происходит в течение 24 часов.</div>
                    </div>
                    <div class="services-content-main-item">
                        <div class="services-content-main-item-title">ВНУТРИГОРОДСКАЯ ДОСТАВКА</div>
                        <div class="services-content-main-item-body">По г.Алматы, г. Астана и другим областным центрам Внутригородская доставка корреспонденции и посылок – доставим корреспонденцию и товары интернет магазинов по городу в кратчайшие сроки.</div>
                    </div>
                    <div class="services-content-main-item">
                        <div class="services-content-main-item-title">МЕЖДУНАРОДНЫЕ НАПРАВЛЕНИЯ</div>
                        <div class="services-content-main-item-body">Международная доставка почтовых отправлений грузов осуществляется в СНГ, США, Европу, Ближний Восток и Азию и обратно в Казахстан. Развитая партнерская сеть позволяет осуществлять доставку курьерских отправлений по всему миру.</div>
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
