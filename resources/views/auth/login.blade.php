@extends('layouts.main')
@section('content')
    <div class="container login-container" style="padding: 100px 0 100px 0;">
        <div class="row justify-content-center row-body">
            <div class="col-lg-4 col-10">
                <div class="row login-card">
                    <div class="col-12 d-none col-lg-6 login-col">
                        <div class="form-register">
                            <div class="form-register-bg"></div>
                            <div class="form-register-item">
                                <div class="form-register-title">Впервые в Spark Logistics!</div>
                                <div class="form-register-desc">Мы доставим что угодно, куда угодно. </div>
                                <button class="form-register-button">Создать Аккаунт</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 login-col">
                        <div class="form-login" id="login_form">
                            <div class="form-login-item">
                                <div class="form-login-title">Вход в модуль!</div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-login-group is-invalid">
                                            <i class="fas fa-user"></i>
                                            <input type="text" class="form-data-input form-data-phone" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-login-group is-invalid">
                                            <i class="fas fa-key"></i>
                                            <input type="password" class="form-data-input login-input" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn-primary login-button">Войти</button>
                                    </div>
                                    @error('password')
                                    <div class="alert alert-danger error-form-message">Не правильный логин или пароль.</div>
                                    @enderror
                                    @error('email')
                                    <div class="alert alert-danger error-form-message">Не правильный логин или пароль.</div>
                                    @enderror
                                </form>
                                <div class="form-group">
                                    <a href="/register">
                                        <button class="btn-primary login-button">Регистрация</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
