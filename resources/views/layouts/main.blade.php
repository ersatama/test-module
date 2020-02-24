<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

    <!-- Font awesome-->
    <script src="https://kit.fontawesome.com/7b9e63c713.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light menu">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/img/logo.png" width="127" height="60" class="d-inline-block align-top" alt="">
        </a>
        <div class="collapse navbar-collapse ml-5" id="navbarNavAltMarkup">
            <ul class="navbar-nav menu-ul">
                <li class="nav-item ml-4 mr-4">
                    <div class="nav-menu-item">
                        <div class="nav-menu-item-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="nav-menu-item-content">
                            <div class="nav-menu-item-content-title">Позвоните нам</div>
                            <div>
                                <a href="#" class="nav-menu-item-content-link">+7 (727) 345-00-75</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item ml-4 mr-4">
                    <div class="nav-menu-item">
                        <div class="nav-menu-item-icon">
                            <i class="far fa-clock"></i>
                        </div>
                        <div class="nav-menu-item-content">
                            <div class="nav-menu-item-content-title">Время работы</div>
                            <div class="nav-menu-item-content-link">Пн-Пт: 09:00 - 18:00</div>
                        </div>
                    </div>
                </li>
                <li class="nav-item ml-4 mr-4">
                    <div class="nav-menu-item">
                        <div class="nav-menu-item-icon">
                            <i class="far fa-envelope-open"></i>
                        </div>
                        <div class="nav-menu-item-content">
                            <div class="nav-menu-item-content-title">Email</div>
                            <div>
                                <a href="#" class="nav-menu-item-content-link">info@spark-logistics.com</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item ml-4 mr-4">
                    social network
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light menu-footer">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto text-light w-100 menu-ul">
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Услуги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Авиаперевозки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Грузоперевозки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Проектные перевозки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Экспресс доставка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Услуги склада</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Контакты</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('content')
</body>
</html>
