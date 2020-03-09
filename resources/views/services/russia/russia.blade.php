@extends('layouts.main')
@section('content')
    <div class="container">
        <h1 class="mt-5">Доставка из России</h1>
        <div class="services-description">Быстро. Качественно. В срок.</div>
        <div class="row mt-5 mb-5">
            <div class="col-6">
                <div class="services-content-main">
                    <div class="services-content-main-item">
                        <div class="services-content-main-item-title">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                        <div class="services-content-main-item-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
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
