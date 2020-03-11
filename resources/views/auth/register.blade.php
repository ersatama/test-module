@extends('layouts.main')

@section('content')
    <div class="container" style="padding: 100px 0 100px 0;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row login-card">
                    <div class="col-6 login-col">
                        <div class="form-login" id="register_form">
                            <div class="form-login-item">
                                <div class="form-login-title">Регистрация в Spark Logistics!</div>
                                <div class="form-login-icon">
                                    <div class="form-login-icon-item">
                                        <i class="fas fa-plane"></i>
                                    </div>
                                    <div class="form-login-icon-item">
                                        <i class="fas fa-train"></i>
                                    </div>
                                    <div class="form-login-icon-item">
                                        <i class="fas fa-ship"></i>
                                    </div>
                                    <div class="form-login-icon-item">
                                        <i class="fas fa-shipping-fast"></i>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-login-group is-invalid">
                                            <i class="fas fa-user"></i>
                                            <input id="name" type="text" class="form-data-input form-data-phone @error('name') error-input @enderror" name="name" value="{{ old('name') }}" required autocomplete="none" autofocus placeholder="Имя">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-login-group is-invalid">
                                            <i class="fas fa-user"></i>
                                            <input id="surname" type="text" class="form-data-input form-data-phone @error('iin') error-input @enderror" name="iin" value="{{ old('iin') }}" required autocomplete="none" autofocus placeholder="ИИН">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-login-group">
                                            <i class="fas fa-key"></i>
                                            <input id="password" type="password" class="form-data-input login-input @error('password') error-input @enderror" minlength="8" maxlength="255" name="password" required autocomplete="current-password" placeholder="Пароль">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn-success login-button">Создать аккаунт</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 login-col">
                        <div class="form-register">
                            <div class="form-register-bg"></div>
                            <div class="form-register-item">
                                <div class="form-register-title">Добро пожаловать в Spark Logistics!</div>
                                <div class="form-register-desc">У вас же есть аккаунт?</div>
                                <a href="/login">
                                    <button class="form-register-button btn-primary">Войти</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        /*
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    */
    @endphp

@endsection
