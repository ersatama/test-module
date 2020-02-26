@extends('layouts.main')
@section('content')
    <div class="container">
        <h1 class="mt-5">ПРОЕКТНЫЕ ПЕРЕВОЗКИ</h1>
        <div class="services-description">Быстро. Качественно. В срок.</div>
        <div class="row mt-5 mb-5">
            <div class="col-6">
                <div class="services-content-main">
                    <div class="services-content-main-item">
                        <div class="services-content-main-item-title">ПЕРЕВОЗКА НЕСТАНДАРТНЫХ ГРУЗОВ</div>
                        <div class="services-content-main-item-body">Перевезём тяжеловесные и крупногабаритные грузы. Груз, который по своим техническим характеристикам (вес, габариты) не может свободно перемещаться по дорогам общего пользования. Это тяжеловесные и крупногабаритные компоненты, технологические линии, военная спецтехника, различное крупное промышленное и энергетическое оборудование.</div>
                    </div>
                    <div class="services-content-main-item">
                        <div class="services-content-main-item-title">ВСЁ СДЕЛАЕМ САМИ</div>
                        <div class="services-content-main-item-body">Мы подберем транспорт специального назначения, разработаем схему перевозки, осуществим разгрузо/погрузочные работы, обеспечим необходимой сопроводительной документацией и разрешениями. Большой опыт перевозок в данном направлении позволяет оптимизировать затраты на транспортировку и реализовывать комплексные проекты максимально безопасно.</div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="spark-logo">
                    <img src="/img/logo2.png">
                </div>
            </div>
        </div>
        @include('services.phone.phone')
    </div>
@endsection
