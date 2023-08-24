@extends('wargoCatering.layouts.main')

@section('container')
    <section class="hero">
        <section id="hero" class="text-white main-content d-flex align-items-center justify-content-center"
            style="background: rgba(0, 0, 0, 0.4);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p class="fw-bold fs-30 text-white" style="letter-spacing: 2px;">WARGO CATERING</p>
                        <p class="fw-bold text-orange fs-20" style="letter-spacing: 5px;">SOLUSITERBAIK
                        </p>
                        <p class="fs-30 fw-regular title-section text-white">"Menyajikan Kenangan di Setiap Sajian: Wargo
                            Catering, di Mana
                            Rasa Menemui
                            Perayaan!"</p>
                        <div class="row justify-content-center gap-2 mt-5">
                            <a href="/home#e-commerce"
                                class="rounded-3 col-lg-2 col-md-3 col-sm-12 col-6 fs-20 fw-medium button-orange text-decoration-none text-white py-2">
                                Beli Sekarang
                            </a>
                            <a href="/home#deskripsi"
                                class="rounded-3 col-lg-2 col-md-3 col-sm-12 col-6 fs-20 fw-medium btn btn-success py-2">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Start Categories of The Month -->
        <section class="py-5 bg-white d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5 d-flex justify-content-center align-items-center">
                        <img src="/assets/img/logo-wargo-catering2.png" class="img-fluid" style="width: 60%" alt="">
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="row pt-3">
                            <p class="text-orange fw-bold fs-20 m-0">Wargo Catering</p>
                            <p class="fs-28 fw-bold title-section">
                                Histori mengenai Wargo Catering.
                            </p>
                        </div>
                        <p class="text-default text-indent-1 text-spacing text-justify">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius, perferendis aut. Quas officiis
                            necessitatibus explicabo ut! Tempora aperiam ratione ab commodi odio culpa aliquid asperiores
                            vel,
                            excepturi
                            saepe ullam iure, deleniti similique repellendus magnam, atque reprehenderit est laudantium quia
                            placeat
                            inventore? Error aliquam voluptate ea dolores, veniam doloribus quam nulla qui voluptas
                            accusamus
                            fuga
                            autem
                            maiores repellat excepturi, eos sapiente, reiciendis odio praesentium eius ipsum.
                            Necessitatibus,
                            debitis
                            voluptates! <a href="/about" class="text-decoration-none">Selengkapnya...</a>
                        </p>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Categories of The Month -->

        <section id="faq" class=" py-5 bg-light d-flex align-items-center">
            <div class="container">
                <div class="row text-center pt-3 mb-3">
                    <p class="text-orange fw-bold fs-20 m-0">FAQ</p>
                    <p class="fs-28 fw-bold title-section">
                        Pertanyaan yang sering ditanyakan pelanggan Wargo Catering.
                    </p>
                </div>
                <div class="container w-75">
                    <div class="accordion" id="accordionExample">
                        @foreach ($faq as $index => $faq)
                            <div class="accordion-item shadow mb-3 bg-body-tertiary rounded-3">
                                <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false"
                                        aria-controls="collapse{{ $faq->id }}">
                                        {{ $faq->pertanyaan }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body" style="max-height: 200px; overflow-y: auto;">
                                        <p>{!! $faq->deskripsi !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>

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
                                        <img src="{{ asset('storage/' . $menuTerbaru->gambar) }}"
                                            class="img-fluid rounded-3"
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
    </section>
@endsection
