@extends('layouts.main')
@section('content')
<div class="container" style="padding: 100px 0 100px 0;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row login-card">
                <div class="col-6 login-col">
                    <div class="form-register">
                        <div class="form-register-bg"></div>
                        <div class="form-register-item">
                            <div class="form-register-title">Добро пожаловать в Spark Logistics!</div>
                            <div class="form-register-desc">Мы доставим что угодно, куда угодно. </div>
                            <button class="form-register-button">Создать Аккаунт</button>
                        </div>
                    </div>
                </div>
                <div class="col-6 login-col">
                    <div class="form-login">
                        <div class="form-login-item">
                            <div class="form-login-title">Войти в Spark Logistics!</div>
                            <input type="text" class="form-data-input">
                            <input type="password" class="form-data-input">
                            <button class="login-button">Войти в кабинет</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
