@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row min-vh-100 flex-column flex-md-row mt-4">
            <aside class="col-12 col-md-2 p-0 flex-shrink-1">
                @include('home.layouts.sidebar')
            </aside>
            <main class="col col-md-10 bg-faded py-3 flex-grow-1">
                <h1>Мой профиль</h1>
                <table class="table mt-3">
                    <tbody>
                    <tr>
                        <th scope="col">Имя</th>
                        <td scope="col">{{Auth::user()->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Полное имя</th>
                        <td>{{Auth::user()->full_name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">БИН</th>
                        <td>{{Auth::user()->iin}}</td>
                    </tr>
                    @if(Auth::user()->phone)
                        <tr>
                            <th scope="row">Телефон</th>
                            <td>{{Auth::user()->phone}}</td>
                        </tr>
                    @endif
                    @if(Auth::user()->email)
                        <tr>
                            <th scope="row">Эл.почта</th>
                            <td>{{Auth::user()->email}}</td>
                        </tr>
                    @endif
                    @if(Auth::user()->email)
                        <tr>
                            <th scope="row">Телефон</th>
                            <td>{{Auth::user()->email}}</td>
                        </tr>
                    @endif
                    @if(Auth::user()->fact_address)
                        <tr>
                            <th scope="row">Фактический адрес</th>
                            <td>{{Auth::user()->fact_address}}</td>
                        </tr>
                    @endif
                    @if(Auth::user()->jur_address)
                        <tr>
                            <th scope="row">>Юридическии адрес</th>
                            <td>{{Auth::user()->jur_address}}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                    <!--<div class="form-group row mb-5">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5">
                            <button type="submit" class="btn-primary login-button">Изменить данные</button>
                        </div>
                    </div>-->
                </form>
                <!--<hr>
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
            </form>-->
            </main>
        </div>
    </div>
@endsection
