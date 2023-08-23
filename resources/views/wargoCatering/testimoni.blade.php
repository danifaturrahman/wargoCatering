@extends('wargoCatering.layouts.main')

@section('container')
    <section>
        <div class="container p-5">
            <div class="row pt-4 pb-5 text-center">
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
                            <!-- Single item -->
                            <div class="carousel-item active">
                                <p class="lead font-italic mx-4 mx-md-5">
                                    "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet
                                    numquam iure provident voluptate esse quasi, voluptas nostrum quisquam!"
                                </p>
                                <div class="mt-5 mb-4">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
                                        class="rounded-circle img-fluid shadow-1-strong" alt="sample image" width="100"
                                        height="100" />
                                </div>
                                <p class="text-muted mb-0">- Anna Morian</p>
                            </div>

                            <!-- Single item -->
                            <div class="carousel-item">
                                <p class="lead font-italic mx-4 mx-md-5">
                                    "Neque cupiditate assumenda in maiores repudiandae mollitia adipisci maiores
                                    repudiandae mollitia consectetur adipisicing architecto elit sed adipiscing
                                    elit."
                                </p>
                                <div class="mt-5 mb-4">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(31).webp"
                                        class="rounded-circle img-fluid shadow-1-strong" alt="sample image" width="100"
                                        height="100" />
                                </div>
                                <p class="text-muted mb-0">- Teresa May</p>
                            </div>

                            <!-- Single item -->
                            <div class="carousel-item">
                                <p class="lead font-italic mx-4 mx-md-5">
                                    "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                    dolore eu fugiat nulla pariatur est laborum neque cupiditate assumenda in
                                    maiores."
                                </p>
                                <div class="mt-5 mb-4">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp"
                                        class="rounded-circle img-fluid shadow-1-strong" alt="sample image" width="100"
                                        height="100" />
                                </div>
                                <p class="text-muted mb-0">- Kate Allise</p>
                            </div>
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
