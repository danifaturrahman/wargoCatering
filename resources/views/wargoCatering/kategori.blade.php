@extends('wargoCatering.layouts.main')

@section('container')
    <!-- Start Menu Prasmanan -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row pt-4 pb-2 text-center">
                <p class="text-orange fw-bold fs-20 m-0">Kategori {{ $kategori->nama }}</p>
                <p class="fs-28 fw-bold title-section">
                    Menu-menu {{ $kategori->nama }} pada Wargo Catering.
                </p>
            </div>
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
                                        href="/detail-menu/{{ $kategori->id }}">Detail Menu</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Menu Prasmanan -->
@endsection
