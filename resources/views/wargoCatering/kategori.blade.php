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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Start Categories of The Month -->
                <section id="carousel-kategori" class="container py-5">
                    <div class="row text-center pt-3">
                        <div class="col-lg-6 m-auto">
                            <p class="text-orange fw-bold fs-20 m-0">KATEGORI {{ $kategori->nama }}</p>
                            <p class="fs-28 text-default fw-semibold">
                                Menu-menu {{ $kategori->nama }} Wargo Catering
                            </p>
                        </div>
                    </div>
                </section>
                <!-- End Categories of The Month -->
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- Start Menu Prasmanan -->
    <section class="bg-light">
        <div class="container mb-5">
            <div class="row">

                @foreach ($kategori->menu as $kategori)
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                                data-mdb-ripple-color="light">
                                <a href="/detail-menu/{{ $kategori->id }}">
                                    <img src="{{ asset('storage/' . $kategori->gambar) }}" class="img-fluid rounded-3"
                                        style="width: 450px; height: 400px; object-fit: cover" />
                                </a>
                            </div>

                            <div class="card-body text-center">
                                <a href="" class="text-reset text-decoration-none">
                                    <p class="card-title mb-1 fs-20 fw-semibold">{{ $kategori->nama }}</p>
                                </a>
                                <a href="" class=" text-muted text-decoration-none">
                                    <p>{{ $kategori->kategori->nama }}</p>
                                </a>
                                <p class="mb-3 fw-semibold text-orange">Rp
                                    {{ number_format($kategori->harga, 0, ',', '.') }}
                                </p>
                                <p><a class="button-orange text-decoration-none"
                                        href="/detail-menu/{{ $kategori->id }}">Masukkan Keranjang</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Menu Prasmanan -->
@endsection
