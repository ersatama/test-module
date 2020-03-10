@extends('layouts.main')
@section('content')
    <div class="container">
        <h1 class="mt-5">АВИАПЕРЕВОЗКИ</h1>
        <div class="services-description">Быстро. Качественно. В срок.</div>
        <div class="row mt-5 mb-5">
            <div class="col-12 col-lg-6">
                <div class="services-content-main">
                    <div class="services-content-main-item">
                        <div class="services-content-main-item-title">СРОЧНАЯ ДОСТАВКА</div>
                        <div class="services-content-main-item-body">При необходимости срочной доставки грузов небольших и средних габаритов мы можем предложить вам авиаперевозки. Заберем и доставим по схеме "аэропорт-аэропорт", "от двери до двери" из и в любую точку мира. Наши специалисты обеспечат обработку и оформление груза в стране отправления, забор и доставку груза до получателя в стране назначения.</div>
                    </div>
                    <div class="services-content-main-item">
                        <div class="services-content-main-item-title">АВИАПЕРЕВОЗКА ГРУЗОВ ПО КАЗАХСТАНУ</div>
                        <div class="services-content-main-item-body">У нас можно заказать доставку груза самолётом по Казахстану из городов: Алматы, Актау, Актобе, Астана, Атырау, Жезказган, Караганда, Кокшетау, Костанай, Кызылорда, Павлодар, Петропавловск, Семей, Тараз, Усть-Каменогорск, Уральск, Шымкент</div>
                    </div>
                    <div class="services-content-main-item">
                        <div class="services-content-main-item-title">АВИАПЕРЕВОЗКА ГРУЗОВ ПО СНГ И ПО МИРУ</div>
                        <div class="services-content-main-item-body">В города России и СНГ Москва, Санкт-Петербург, Казань, Новосибирск, Оренбург, Самара, Киев, Минск, Баку, Тбилиси, Ашхабад, Ташкент, Бишкек, Душанбе, а так-же большинство городов мира.</div>
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
