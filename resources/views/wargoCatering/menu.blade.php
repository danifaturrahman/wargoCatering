@extends('wargoCatering.layouts.main')

@section('container')
    <section id="carousel-kategori" class="py-5 bg-white d-flex align-items-center">
        <div class="container">
            <div class="row pt-4 pb-2 text-center">
                <p class="text-orange fw-bold fs-20 m-0">Kategori Katering</p>
                <p class="fs-28 fw-bold title-section">
                    Kategori menu katering dari Wargo Catering.
                </p>
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
            </div>
        </div>
    </section>

    <!-- Start Menu Terlaris -->
    <section class="bg-light py-5 d-flex align-items-center">
        <div class="container">
            <div class="row pt-3 pb-2 text-center">
                <p class="text-orange fw-bold fs-20 m-0">Menu Terlaris</p>
                <p class="fs-28 fw-bold title-section">
                    Menu terlaris dari Wargo Catering.
                </p>
            </div>

            <div class="row justify-content-center">

                @foreach ($menuTerlaris as $menuTerlaris)
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                                data-mdb-ripple-color="light">
                                <a href="/detail-menu/{{ $menuTerlaris->id }}">
                                    <img src="{{ asset('storage/' . $menuTerlaris->gambar) }}" class="img-fluid rounded-3"
                                        style="width: 450px; height: 400px; object-fit: cover" />
                                </a>
                            </div>

                            <div class="card-body text-center">
                                <a href="" class="text-reset text-decoration-none">
                                    <p class="card-title mb-1 fs-20 fw-semibold">{{ $menuTerlaris->nama }}</p>
                                </a>
                                <a href="" class=" text-muted text-decoration-none">
                                    <p>{{ $menuTerlaris->kategori->nama }}</p>
                                </a>
                                <p class="mb-3 fw-semibold text-orange">Rp
                                    {{ number_format($menuTerlaris->harga, 0, ',', '.') }}
                                </p>
                                <p><a class="button-orange text-decoration-none"
                                        href="/detail-menu/{{ $menuTerlaris->id }}">Detail Menu</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Menu Terlaris -->

    <!-- Start Menu Terbaru -->
    <section class="bg-white py-5 d-flex align-items-center">
        <div class="container py-5">
            <div class="row pt-3 pb-2 text-center">
                <p class="text-orange fw-bold fs-20 m-0">Menu Terbaru</p>
                <p class="fs-28 fw-bold title-section">
                    Menu terbaru dari Wargo Catering.
                </p>
            </div>

            <div class="row justify-content-center">

                @foreach ($menuTerbaru as $menuTerbaru)
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                                data-mdb-ripple-color="light">
                                <a href="/detail-menu/{{ $menuTerbaru->id }}">
                                    <img src="{{ asset('storage/' . $menuTerbaru->gambar) }}" class="img-fluid rounded-3"
                                        style="width: 450px; height: 400px; object-fit: cover" />
                                </a>
                            </div>

                            <div class="card-body text-center">
                                <a href="" class="text-reset text-decoration-none">
                                    <p class="card-title mb-1 fs-20 fw-semibold">{{ $menuTerbaru->nama }}</p>
                                </a>
                                <a href="" class=" text-muted text-decoration-none">
                                    <p>{{ $menuTerbaru->kategori->nama }}</p>
                                </a>
                                <p class="mb-3 fw-semibold text-orange">Rp
                                    {{ number_format($menuTerbaru->harga, 0, ',', '.') }}
                                </p>
                                <p><a class="button-orange text-decoration-none"
                                        href="/detail-menu/{{ $menuTerbaru->id }}">Detail Menu</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
    </section>
    <!-- End Menu Terbaru -->

    <!-- Start Semua Menu -->
    <section class="bg-light py-5 d-flex align-items-center">
        <div class="container py-5">
            <div class="row pt-3 pb-2 text-center">
                <p class="text-orange fw-bold fs-20 m-0">Semua Menu</p>
                <p class="fs-28 fw-bold title-section">
                    Menu-menu dari Wargo Catering.
                </p>
            </div>

            <div class="row justify-content-center">

                @foreach ($semuaMenu as $semuaMenu)
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                                data-mdb-ripple-color="light">
                                <a href="/detail-menu/{{ $semuaMenu->id }}">
                                    <img src="{{ asset('storage/' . $semuaMenu->gambar) }}" class="img-fluid rounded-3"
                                        style="width: 450px; height: 400px; object-fit: cover" />
                                </a>
                            </div>

                            <div class="card-body text-center">
                                <a href="" class="text-reset text-decoration-none">
                                    <p class="card-title mb-1 fs-20 fw-semibold">{{ $semuaMenu->nama }}</p>
                                </a>
                                <a href="" class=" text-muted text-decoration-none">
                                    <p>{{ $semuaMenu->kategori->nama }}</p>
                                </a>
                                <p class="mb-3 fw-semibold text-orange">Rp
                                    {{ number_format($semuaMenu->harga, 0, ',', '.') }}
                                </p>
                                <p><a class="button-orange text-decoration-none"
                                        href="/detail-menu/{{ $semuaMenu->id }}">Detail Menu</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
    </section>
    <!-- End Semua Menu -->
@endsection
