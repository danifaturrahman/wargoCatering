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


    <!-- Start Content -->
    <div class="container py-3 mt-3">
        <div class="row">
            <div class="col-lg-12">
                <!-- Start Categories of The Month -->
                <section id="carousel-kategori" class="container">
                    <div class="row text-center pt-3">
                        <div class="row text-center py-3">
                            <div class="col-lg-6 m-auto">
                                <p class="text-orange fw-bold fs-20 m-0">KATEGORI</p>
                                <p class="fs-28 text-default fw-semibold">
                                    Ketegori katering dari Wargo Catering
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        @foreach ($kategori as $kategori)
                            <div class="col-12 col-md-4 p-5 mt-3">
                                <a href="#"><img src="{{ asset('storage/' . $kategori->gambar) }}"
                                        class="rounded-circle img-fluid border"></a>
                                <p class="text-center fw-semibold fs-20 text-default mt-3 mb-3">{{ $kategori->nama }}</p>
                                <p class="text-center"><a class="text-decoration-none button-orange"
                                        href="/kategori/{{ $kategori->id }}">Belanja
                                        Sekarang</a></p>
                            </div>
                        @endforeach


                        {{-- <div class="col-12 col-md-4 p-5 mt-3">
                            <a href="#"><img src="./assets/img/sate2.jpg" class="rounded-circle img-fluid border"></a>
                            <p class="text-center fw-semibold fs-20 text-default mt-3 mb-3">Nasi Kotak</p>
                            <p class="text-center"><a class="text-decoration-none button-orange" href="/nasiKotak">Belanja
                                    Sekarang</a></p>
                        </div>
                        <div class="col-12 col-md-4 p-5 mt-3">
                            <a href="#"><img src="./assets/img/nasi-tumpeng.jpg"
                                    class="rounded-circle img-fluid border"></a>
                            <p class="text-center fw-semibold fs-20 text-default mt-3 mb-3">Makanan Penutup</p>
                            <p class="text-center"><a class="text-decoration-none button-orange"
                                    href="/makananPenutup">Belanja Sekarang</a></p>
                        </div> --}}
                    </div>
                </section>
                <!-- End Categories of The Month -->


            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- Start Menu Terlaris -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center">
                <div class="col-lg-6 m-auto">
                    <p class="text-orange fw-bold fs-20 m-0">MENU TERLARIS</p>
                    <p class="fs-28 text-default fw-semibold">
                        Menu terlaris dari Wargo Catering
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

    </section>
    <!-- End Menu Terlaris -->

    <!-- Start Menu Terbaru -->
    <section>
        <div class="container py-5">
            <div class="row text-center">
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
    </section>
    <!-- End Menu Terbaru -->
@endsection
