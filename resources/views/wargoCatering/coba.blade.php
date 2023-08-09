<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wargo Catering</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <!-- Bootstrap CSS & JS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    </script>

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
    <!--
        
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>

    @include('wargoCatering.partials.navbar')

    <section>
        <div class="row text-center">
            <div class="col-md-12">
                <!-- Carousel wrapper -->
                <div id="carouselBasicExample" class="carousel slide carousel-dark" data-mdb-ride="carousel">
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
                                    class="rounded-circle img-fluid shadow-1-strong" alt="smaple image" width="100"
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
                                    class="rounded-circle img-fluid shadow-1-strong" alt="smaple image" width="100"
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
                                    class="rounded-circle img-fluid shadow-1-strong" alt="smaple image" width="100"
                                    height="100" />
                            </div>
                            <p class="text-muted mb-0">- Kate Allise</p>
                        </div>
                    </div>
                    <!-- Inner -->

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample"
                        data-mdb-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample"
                        data-mdb-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- Carousel wrapper -->
            </div>
        </div>
    </section>

    @include('wargoCatering.partials.footer')

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->
</body>

</html>
