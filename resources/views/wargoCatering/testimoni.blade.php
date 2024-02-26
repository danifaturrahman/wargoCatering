@extends('wargoCatering.layouts.main')

@section('container')
    <section class="bg-white d-flex align-items-center">
        <div class="container p-3">
            <div class="row pt-4 pb-4 text-center">
                <p class="text-orange fw-bold fs-20 m-0">Testimoni</p>
                <p class="fs-28 fw-bold title-section">
                    Testimoni dari pelanggan Wargo Catering.
                </p>
            </div>
            <div class="row text-center card p-5">
                <div class="col-md-12">
                    <!-- Carousel wrapper -->
                    <div id="carouselBasicExample" class="carousel slide carousel-dark" data-bs-ride="carousel">
                        <!-- Inner -->
                        <div class="carousel-inner">
                            @foreach ($testimoni as $key => $item)
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                    <p class="lead font-italic mx-4 mx-md-5">
                                        "{{ $item->ulasan }}"
                                    </p>
                                    <p style="color: rgb(209, 209, 0);" class="mb-0 fs-30">
                                        {{ $convertToStarRating($item->nilai) }}
                                    </p>
                                    <div class="mt-5 mb-4">
                                        <img src="/assets/img/profile.jpg" class="rounded-circle img-fluid shadow-1-strong"
                                            alt="sample image" width="100" height="100" />
                                    </div>
                                    <p class="text-muted mb-0">- {{ $item->user->name }}</p>
                                </div>
                            @endforeach
                        </div>
                        <!-- Inner -->

                        <!-- Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBasicExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselBasicExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- Carousel wrapper -->
                </div>
            </div>
        </div>
    </section>
@endsection
