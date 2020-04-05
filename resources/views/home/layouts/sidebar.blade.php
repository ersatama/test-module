<nav class="navbar navbar-expand navbar-dark text-dark flex-md-column flex-row align-items-start py-2 navbar-menu-mobile-mini">
    <div class="collapse navbar-collapse w-100 ">
        <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
            <li class="nav-item">
                <a class="nav-link pl-0 text-nowrap @if(Request::is('home')) text-primary @else text-dark @endif" href="/home"><i class="fas fa-home"></i> <span class="font-weight-bold ml-2">Главная</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-nowrap pl-0 @if(Request::is('profile')) text-primary  @else text-dark @endif" href="/profile"><i class="fas fa-user"></i> <span class="d-none d-md-inline font-weight-bold ml-2">Мой профиль</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-nowrap pl-0 @if(Request::is('search')) text-primary  @else text-dark @endif" href="/search"><i class="fas fa-map-marker-alt"></i> <span class="d-none d-md-inline font-weight-bold ml-2">Отслеживание</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-nowrap pl-0 @if(Request::is('order')) text-primary  @else text-dark @endif" href="/order"><i class="fas fa-plus-circle"></i> <span class="d-none d-md-inline font-weight-bold ml-2">Добавить заказ</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-nowrap pl-0 @if(Request::is('instruction')) text-primary  @else text-dark @endif" href="/instruction"><i class="fas fa-info-circle"></i> <span class="d-none d-md-inline font-weight-bold ml-2">Инструкция</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-nowrap pl-0 text-dark font-weight-bold" href="/logout"><i class="fas fa-sign-out-alt"></i> <span class="d-none d-md-inline ml-2">Выйти</span></a>
            </li>
        </ul>
    </div>
</nav>
