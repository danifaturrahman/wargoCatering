@extends('wargoCatering.layouts.main')

@section('container')
    <!-- Start Contact -->
    <section class="bg-white py-5">
        <div class="container">
            <div class="row pt-4 pb-4 text-center">
                <p class="text-orange fw-bold fs-20 m-0">Kontak</p>
                <p class="fs-28 fw-bold title-section">
                    Cara untuk menghubungi Wargo Catering.
                </p>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 p-5">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="/contact" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="inputnama fw-semibold">Nama</label>
                                <input type="text"
                                    class="form-control @error('nama')
                                is-invalid
                            @enderror mt-1"
                                    id="nama" name="nama" placeholder="Nama...">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="inputemail fw-semibold">Email</label>
                                <input type="email"
                                    class="form-control @error('email')
                                is-invalid
                            @enderror mt-1"
                                    id="email" name="email" placeholder="Email...">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="inputPesan fw-semibold">Kritik & Saran</label>
                            <textarea
                                class="form-control @error('pesan')
                            is-invalid
                        @enderror mt-1"
                                id="pesan" name="pesan" placeholder="Ketik pesan disini.." rows="8"></textarea>
                            @error('pesan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col text-end mt-2">
                                <button type="submit" class="button-orange px-3">Let’s Talk</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-6 p-5">
                    <div class="row">
                        <p class="fs-20 fw-semibold">Kontak</p>
                        <div class="col-1 text-center">
                            <p class="fs-15 fw-regular"><i class="
                                fas fa-phone"></i></p>
                        </div>
                        <div class="col-11">
                            <p class="fs-15 fw-regular text-orange fw-semibold">
                                0895
                                6198 07702</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <p class="fs-20 fw-semibold">Media Sosial</p>
                        <div class="col-1 text-center">
                            <p class="fs-15 fw-regular"><i class="
                                fab fa-whatsapp"></i></p>
                            <p class="fs-15 fw-regular"><i class="
                                fab fa-instagram"></i>
                            </p>
                        </div>
                        <div class="col-11">
                            <p class="fs-15 fw-regular text-orange fw-semibold">
                                0895
                                6198 07702</p>
                            <p class="fs-15 fw-regular text-orange fw-semibold">
                                @wargocatering</p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <p class="fs-20 fw-semibold">Alamat</p>
                        <div class="col-1 text-center">
                            <p><i class="fa-solid fa-location-dot"></i></p>
                        </div>
                        <div class="col-11">
                            <p class="fs-15 fw-regular text-orange fw-semibold">Indonesia</p>
                            <p class="fs-15 fw-regular text-orange fw-semibold">Kalimantan Barat, Pontianak</p>
                            <p class="fs-15 fw-regular text-orange fw-semibold">Jalan Karna Sosial Gang Purwosari 2 Nomor
                                25D</p>
                        </div>
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
                <div class="row pt-4 pb-4 text-center">
                    <p class="text-orange fw-bold fs-20 m-0">Denah</p>
                    <p class="fs-28 fw-bold title-section">
                        Denah menuju lokasi usaha Wargo Catering.
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
