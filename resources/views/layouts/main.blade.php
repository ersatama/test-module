<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <!-- Font awesome-->
    <script src="https://kit.fontawesome.com/7b9e63c713.js" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.maskedinput.js') }}"></script>
    <script src="{{ URL::asset('js/app.js') }}"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg menu navbar-light bg-light d-block d-md-none">
        <a class="navbar-brand" href="#">
            <img src="/img/logo.png" width="127" height="60" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler float-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/services">Услуги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/services/avia">Авиаперевозки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/services/cargo">Грузоперевозки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/services/project">Проектные перевозки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/services/express">Экспресс доставка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/services/storage">Услуги склада</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contacts">Контакты</a>
                </li>
                <li class="nav-item ml-4 mr-4">
                    <div class="nav-menu-item">
                        <div class="nav-menu-item-icon">
                            <i class="far fa-clock" aria-hidden="true"></i>
                        </div>
                        <div class="nav-menu-item-content">
                            <div class="nav-menu-item-content-link">Пн-Пт: 09:00 - 18:00</div>
                        </div>
                    </div>
                </li>
                <li class="nav-item ml-4 mr-4">
                    <div class="nav-menu-item">
                        <div class="nav-menu-item-icon">
                            <i class="fas fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="nav-menu-item-content">
                            <a href="#" class="nav-menu-item-content-link">+7 (727) 345-00-75</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item ml-4 mr-4">
                    <div class="nav-menu-item">
                        <div class="nav-menu-item-icon">
                            <i class="far fa-envelope-open"></i>
                        </div>
                        <div class="nav-menu-item-content">
                            <a href="#" class="nav-menu-item-content-link">info@spark-logistics.com</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

<nav class="navbar navbar-expand-lg navbar-light menu d-none d-md-block">
    <div class="container">
        <a class="navbar-brand" href="/">
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
                <li class="nav-item ml-4 mr-4 pull-right">
                    <div class="social-network">
                        <div class="social-network-icon">
                            <i class="fab fa-facebook-f"></i>
                        </div>
                        <div class="social-network-icon">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <a href="/login">
                            <div class="social-network-icon">
                                <i class="fas fa-sign-in-alt"></i>
                            </div>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light menu-footer d-none d-lg-block">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto text-light w-100 menu-ul">
                <li class="nav-item">
                    <a class="nav-link text-light" href="/services">Услуги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/about">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/services/avia">Авиаперевозки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/services/cargo">Грузоперевозки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/services/project">Проектные перевозки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/services/express">Экспресс доставка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/services/storage">Услуги склада</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/contacts">Контакты</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('content')

<!-- Footer -->
<footer class="page-footer font-small special-color-dark pt-4 footer">

    <!-- Footer Elements -->
    <div class="container">

        <!-- Social buttons -->
        <ul class="list-unstyled list-inline text-center footer-social">
            <li class="list-inline-item">
                <a class="btn-floating btn-fb mx-1">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-tw mx-1">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        </ul>
        <!-- Social buttons -->

    </div>
    <!-- Footer Elements -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        ©  2010 - {{date('Y')}}
        <a>Spark Logistics</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>
