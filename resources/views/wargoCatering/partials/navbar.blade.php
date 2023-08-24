<!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none"
                    href="mailto:wargocatering@gmail.com">wargocatering@gmail.com</a>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:0895-6198-07702">0895-6198-07702</a>
            </div>
            <div>
                <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i
                        class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.instagram.com/" target="_blank"><i
                        class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://twitter.com/" target="_blank"><i
                        class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i
                        class="fab fa-linkedin fa-sm fa-fw"></i></a>
            </div>
        </div>
    </div>
</nav>
<!-- Close Top Nav -->


<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow bg-white">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="col-2 col-sm-2 col-md-2 col-lg-1">
            <img src="/assets/img/logo-wargo-catering.png" class="img-fluid" style="width: 60%" alt="">
        </div>
        <a class="navbar-brand text-orange fw-semibold fs-24 title-section" href="/home">
            Wargo Catering
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
            id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item {{ Request::is('home', '/') ? 'nav-active' : '' }}">
                        <a class="nav-link mx-1 {{ Request::is('home') ? 'nav-active-color' : '' }}"
                            href="/home">Beranda</a>
                    </li>
                    <li class="nav-item {{ Request::is('menu') ? 'nav-active' : '' }}">
                        <a class="nav-link mx-1 {{ Request::is('menu') ? 'nav-active-color' : '' }}"
                            href="/menu">Menu</a>
                    </li>
                    <li class="nav-item {{ Request::is('testimoni') ? 'nav-active' : '' }}">
                        <a class="nav-link mx-1 {{ Request::is('testimoni') ? 'nav-active-color' : '' }}"
                            href="/testimoni">Testimoni</a>
                    </li>
                    <li class="nav-item {{ Request::is('contact') ? 'nav-active' : '' }}">
                        <a class="nav-link mx-1 {{ Request::is('contact') ? 'nav-active-color' : '' }}"
                            href="/contact">Kontak</a>
                    </li>
                    <li class="nav-item {{ Request::is('about') ? 'nav-active' : '' }}">
                        <a class="nav-link mx-1 {{ Request::is('about') ? 'nav-active-color' : '' }}"
                            href="/about">Tentang Kami</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="dropdown dropdown-hover">
                    <a class="nav-icon position-relative text-decoration-none fs-20" role="button">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    </a>
                    <ul class="dropdown-menu p-2">
                        <li><a class="dropdown-item fs-16" href="/profile">Profile</a></li>
                        <li><a class="dropdown-item" href="/user-dashboard-order">Pesanan</a></li>
                        <li><a class="dropdown-item" href="/user-dashboard-notifikasi">Notifikasi</a></li>
                        <hr>
                        @if (Auth::check())
                            <li>
                                <form class="ms-3" method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="btn btn-danger ">Log out</button>
                                </form>
                            </li>
                        @else
                            <a href="{{ route('login') }}" class="ms-3 mb-2 btn btn-primary btn-sm">Login</a>

                            <a href="{{ route('register') }}" class="ms-3 btn btn-warning btn-sm">Register</a>
                        @endif

                    </ul>
                </div>

                <a class="nav-icon position-relative text-decoration-none fs-20" href="/cart">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    @if (Auth::check())
                        <span
                            class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-danger">{{ Auth::user()->cart->count() }}</span>
                    @endif
                </a>

            </div>
        </div>

    </div>
</nav>
<!-- Close Header -->
