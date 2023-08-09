@extends('wargoCatering.layouts.main')

@section('container')
    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q"
                        placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Start Banner Hero -->
    <section id="carousel-home">
        <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
                <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row p-5 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-md-12 col-lg-6 order-lg-last d-flex justify-content-center">
                                <img src="./assets/img/sate.jpg" class="rounded-circle img-fluid border">
                            </div>
                            <div class="col-lg-6 mb-0">
                                <div class="text-align-left">
                                    <h1 class="fs-40 text-orange fw-bold">Nasi Tumpeng</h1>
                                    <p>
                                        Nasi tumpeng adalah hidangan tradisional Indonesia yang biasanya disajikan dalam
                                        acara
                                        perayaan atau peringatan penting. Nasi tumpeng terdiri dari sejumlah nasi kuning
                                        yang
                                        diatur dalam bentuk kerucut di atas tampah atau piring besar.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row p-5 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-md-12 col-lg-6 order-lg-last d-flex justify-content-center">
                                <img src="./assets/img/sate2.jpg" class="rounded-circle img-fluid border">
                            </div>
                            <div class="col-lg-6 mb-0">
                                <div class="text-align-left">
                                    <h1 class="fs-40 text-orange fw-bold">Nasi Tumpeng</h1>
                                    <p>
                                        Nasi tumpeng adalah hidangan tradisional Indonesia yang biasanya disajikan dalam
                                        acara
                                        perayaan atau peringatan penting. Nasi tumpeng terdiri dari sejumlah nasi kuning
                                        yang
                                        diatur dalam bentuk kerucut di atas tampah atau piring besar.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row p-5 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-md-12 col-lg-6 order-lg-last d-flex justify-content-center">
                                <img src="./assets/img/nasi-tumpeng.jpg" class="rounded-circle img-fluid border">
                            </div>
                            <div class="col-lg-6 mb-0">
                                <div class="text-align-left">
                                    <h1 class="fs-40 text-orange fw-bold">Nasi Tumpeng</h1>
                                    <p>
                                        Nasi tumpeng adalah hidangan tradisional Indonesia yang biasanya disajikan dalam
                                        acara
                                        perayaan atau peringatan penting. Nasi tumpeng terdiri dari sejumlah nasi kuning
                                        yang
                                        diatur dalam bentuk kerucut di atas tampah atau piring besar.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
                role="button" data-bs-slide="prev">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
                role="button" data-bs-slide="next">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
    </section>

    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto mb-3">
                <p class="text-orange fw-bold fs-20 m-0">WARGO CATERING</p>
                <p class="fs-28 text-default fw-semibold">
                    Tentang Wargo Catering
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6 text-center">
                <img src="/assets/img/logo-wargo-catering2.png" class="img-fluid" style="width: 60%" alt="">
            </div>
            <div class="col-12 col-lg-6">
                <p class="text-default text-indent-1 text-spacing text-justify">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius, perferendis aut. Quas officiis
                    necessitatibus explicabo ut! Tempora aperiam ratione ab commodi odio culpa aliquid asperiores vel,
                    excepturi
                    saepe ullam iure, deleniti similique repellendus magnam, atque reprehenderit est laudantium quia placeat
                    inventore? Error aliquam voluptate ea dolores, veniam doloribus quam nulla qui voluptas accusamus fuga
                    autem
                    maiores repellat excepturi, eos sapiente, reiciendis odio praesentium eius ipsum. Necessitatibus,
                    debitis
                    voluptates! <a href="/about" class="text-decoration-none">Selengkapnya...</a>
                </p>
                <div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <p class="text-orange fw-bold fs-20 m-0">MENU TERBARU</p>
                    <p class="fs-28 text-default fw-semibold">
                        Menu terbaru dari Wargo Catering
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card">
                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                            data-mdb-ripple-color="light">
                            <a href="/detail-menu">
                                <img src="/assets/img/sate.jpg" class="img-fluid rounded-3"
                                    style="width: 450px; height: 400px; object-fit: cover" />
                            </a>
                        </div>

                        <div class="card-body text-center">
                            <a href="" class="text-reset text-decoration-none">
                                <p class="card-title mb-1 fs-20 fw-semibold">Sate</p>
                            </a>
                            <a href="" class=" text-muted text-decoration-none">
                                <p>Prasmanan</p>
                            </a>
                            <p class="mb-3 fw-semibold text-orange">Rp. 25,000</p>
                            <p><a class="button-orange text-decoration-none">Masukkan Keranjang</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card">
                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                            data-mdb-ripple-color="light">
                            <a href="/detail-menu">
                                <img src="/assets/img/sate.jpg" class="img-fluid rounded-3"
                                    style="width: 450px; height: 400px; object-fit: cover" />
                            </a>
                        </div>

                        <div class="card-body text-center">
                            <a href="" class="text-reset text-decoration-none">
                                <p class="card-title mb-1 fs-20 fw-semibold">Sate</p>
                            </a>
                            <a href="" class=" text-muted text-decoration-none">
                                <p>Prasmanan</p>
                            </a>
                            <p class="mb-3 fw-semibold text-orange">Rp. 25,000</p>
                            <p><a class="button-orange text-decoration-none">Masukkan Keranjang</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card">
                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                            data-mdb-ripple-color="light">
                            <a href="/detail-menu">
                                <img src="/assets/img/sate.jpg" class="img-fluid rounded-3"
                                    style="width: 450px; height: 400px; object-fit: cover" />
                            </a>
                        </div>

                        <div class="card-body text-center">
                            <a href="" class="text-reset text-decoration-none">
                                <p class="card-title mb-1 fs-20 fw-semibold">Sate</p>
                            </a>
                            <a href="" class=" text-muted text-decoration-none">
                                <p>Prasmanan</p>
                            </a>
                            <p class="mb-3 fw-semibold text-orange">Rp. 25,000</p>
                            <p><a class="button-orange text-decoration-none">Masukkan Keranjang</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Featured Product -->


    {{-- <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="./assets/img/sate2.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a href="shop-single.html" class="fs-20 text-decoration-none text-dark">Sate</a>
                            <p class="card-text">
                                Daging Empuk dan Bumbu yang Menggoda Lidah
                            </p>
                            <p class="text-success card-text text-left mt-auto">Rp. 50000</p>
                            <p><a class="btn btn-success">Masukkan Keranjang</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="./assets/img/sate.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a href="shop-single.html" class="fs-20 text-decoration-none text-dark">Sate</a>
                            <p class="card-text">
                                Daging Empuk dan Bumbu yang Menggoda Lidah
                            </p>
                            <p class="text-success card-text text-left mt-auto">Rp. 50000</p>
                            <p><a class="btn btn-success">Masukkan Keranjang</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="./assets/img/nasi-tumpeng.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a href="shop-single.html" class="fs-20 text-decoration-none text-dark">Sate</a>
                            <p class="card-text">
                                Daging Empuk dan Bumbu yang Menggoda Lidah
                            </p>
                            <p class="text-success card-text text-left mt-auto">Rp. 50000</p>
                            <p><a class="btn btn-success">Masukkan Keranjang</a></p>
                        </div>
                    </div>
                </div>
            </div> --}}
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
@endsection
