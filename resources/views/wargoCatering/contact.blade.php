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


    <!-- Start Contact -->
    <section class="bg-white">
        <div class="container py-5">
            <div class="row text-center">
                <div class="col-lg-6 m-auto">
                    <p class="text-orange fw-bold fs-20 m-0">KONTAK</p>
                    <p class="fs-28 text-default fw-semibold">
                        Kontak untuk menghubungi Wargo Catering
                    </p>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-6 p-5">
                    <form method="post">
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="inputname">Nama</label>
                                <input type="text" class="form-control mt-1" id="name" name="name"
                                    placeholder="Name">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="inputemail">Email</label>
                                <input type="email" class="form-control mt-1" id="email" name="email"
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="inputmessage">Kritik & Saran</label>
                            <textarea class="form-control mt-1" id="message" name="message" placeholder="Message" rows="8"></textarea>
                        </div>
                        <div class="row">
                            <div class="col text-end mt-2">
                                <button type="submit" class="button-orange px-3">Let’s Talk</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-6 p-5">
                    <div class="row">
                        <p class="fs-20 fw-semibold">Kontak</p>
                        <div class="row mb-3">
                            <p class="fs-15 fw-regular">0895 6198 07702</p>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <p class="fs-20 fw-semibold">Alamat</p>
                        <p class="fs-15 fw-regular">Indonesia</p>
                        <p class="fs-15 fw-regular">Kalimantan Barat, Pontianak</p>
                        <p class="fs-15 fw-regular">Komp. Perdana Square Blok I No. 10 - 11</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact -->

    <!-- Start Maps -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center">
                <div class="col-lg-6 m-auto">
                    <p class="text-orange fw-bold fs-20 m-0">MAP</p>
                    <p class="fs-28 text-default fw-semibold">
                        Map menuju lokasi Wargo Catering
                    </p>
                </div>
            </div>
            <div class="col-12 p-4">
                <iframe class="m-auto "
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.816767545029!2d109.32250309999999!3d-0.0505497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d59d3d014cddd%3A0xf14bb27d1b6ea785!2sWARGO%20Catering!5e0!3m2!1sen!2sid!4v1688288411066!5m2!1sen!2sid"
                    width="100%" height="400px" style="border-radius:2px; box-shadow: 0 0 2px 2px rgba(0, 0, 0, 0.25)"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-- End Maps -->
@endsection
