@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row min-vh-100 flex-column flex-md-row mt-4">
            <aside class="col-12 col-md-2 p-0 flex-shrink-1">
                @include('home.layouts.sidebar')
            </aside>
            <main class="col col-md-10 bg-faded py-3 flex-grow-1">
                <h1>Мой профиль</h1>
                <form method="POST" action="/profile">
                    @csrf
                    <div class="form-group row mt-5">
                        <label for="name" class="col-sm-2 col-form-label">Имя</label>
                        <div class="col-sm-5">
                            <div class="form-login-group is-invalid">
                                <i class="fas fa-user" aria-hidden="true"></i>
                                <input type="text" value="{{Auth::user()->name}}" class="form-data-input form-data-phone " id="name" name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Фамилия</label>
                        <div class="col-sm-5">
                            <div class="form-login-group is-invalid">
                                <i class="fas fa-user" aria-hidden="true"></i>
                                <input type="text" value="{{Auth::user()->surname}}" class="form-data-input form-data-phone " id="name" name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Отчество</label>
                        <div class="col-sm-5">
                            <div class="form-login-group is-invalid">
                                <i class="fas fa-user" aria-hidden="true"></i>
                                <input type="text" value="{{Auth::user()->lastname}}" class="form-data-input form-data-phone " id="name" name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-5">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5">
                            <button type="submit" class="btn-primary login-button">Изменить данные</button>
                        </div>
                    </div>
                </form>
                <hr>
                <h1>Мой пароль</h1>
                <div class="alert alert-success text-center" role="alert">Ваш пароль успешно изменён!</div>
                <form method="POST" action="/profile">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Старый пароль</label>
                        <div class="col-sm-5">
                            <div class="form-login-group is-invalid">
                                <i class="fas fa-key" aria-hidden="true"></i>
                                <input type="password" class="form-data-input form-data-phone " id="old" name="old" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Новый пароль</label>
                        <div class="col-sm-5">
                            <div class="form-login-group is-invalid">
                                <i class="fas fa-key" aria-hidden="true"></i>
                                <input type="password" class="form-data-input form-data-phone " id="password" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Подтвердите новый пароль</label>
                        <div class="col-sm-5">
                            <div class="form-login-group is-invalid">
                                <i class="fas fa-key" aria-hidden="true"></i>
                                <input type="password" class="form-data-input form-data-phone " id="confirm" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-5">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5">
                            <button type="submit" class="btn-primary login-button">Изменить пароль</button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>
@endsection
