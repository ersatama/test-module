@extends('layouts.main')
@section('content')
    <div class="container">
        <h1 class="mt-5">ГРУЗОПЕРЕВОЗКИ</h1>
        <div class="services-description">Быстро. Качественно. В срок.</div>
        <div class="row mt-5 mb-5">
            <div class="col-12 col-lg-6">
                <div class="services-content-main">
                    <div class="services-content-main-item">
                        <div class="services-content-main-item-title">ПЕРЕВОЗКА ГРУЗОВ.</div>
                        <div class="services-content-main-item-body">Перевозки грузов по Казахстану и России по принципу "от двери до двери", в том числе в удаленные регионы.</div>
                    </div>
                    <div class="services-content-main-item">
                        <div class="services-content-main-item-title">ПЕРЕВОЗКА ГЕНЕРАЛЬНЫХ ГРУЗОВ ­</div>
                        <div class="services-content-main-item-body">Перевозка продукции полными фурами, рефрижераторные перевозки любой сложности, включая перевозки грузов с разными температурными режимами в одном транспортном средстве. Для товаров, требующих определенной температуры хранения и замороженных продуктов мы используем специальные машины: заданный температурный режим (-25÷+25°C) поддерживается на протяжении всего пути следования.</div>
                    </div>
                    <div class="services-content-main-item">
                        <div class="services-content-main-item-title">РАБОТАЕМ С ФИЗИЧЕСКИМИ И ЮРИДИЧЕСКИМИ ЛИЦАМИ</div>
                        <div class="services-content-main-item-body">Если вы физическое лицо, и вам нужно отправить посылку, просто позвоните к нам. Приедет курьер, заберет посылку и доставит по указанному адресу. Если вы юридическое лицо, и вам нужно отправить товар в регион, мы можем его забрать, довезти, взять оплату с клиента и переправить вам на расчетный счет.</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="spark-logo">
                    <img src="/img/logo2.png" width="100%">
                </div>
            </div>
        </div>
        @include('services.phone.phone')
    </div>
@endsection
