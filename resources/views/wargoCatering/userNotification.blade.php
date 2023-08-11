@extends('wargoCatering.layouts.main')

@section('container')
    <section>
        <div class="container">
            <div class="row p-5 ">
                <div class="row pb-2 text-center">
                    <p class="text-orange fw-bold fs-20 m-0">Dashboard Pelanggan</p>
                    <p class="fs-28 fw-bold title-section">
                        Menu dashboard untuk pelanggan Wargo Catering.
                    </p>
                </div>
                <div class="col-lg-3">
                    <div class="container border border-secondary-subtle p-4 bg-white rounded-2">
                        <a href="/user-dashboard-profile" class="text-decoration-none row non-active-user-dashboard">
                            <div class="row mb-1">
                                <div class="col-2">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="col-9">
                                    Profile
                                </div>
                            </div>
                        </a>

                        <a href="/user-dashboard-profile" class="text-decoration-none row my-1 non-active-user-dashboard">
                            <div class="row mb-1">
                                <div class="col-2">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="col-10">
                                    Pesanan
                                </div>
                            </div>
                        </a>

                        <a href="/user-dashboard-profile" class="text-decoration-none row active-user-dashboard">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <div class="col-10">
                                    Notifikasi
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="container border border-secondary-subtle p-3">
                        {{-- @foreach ($notifikasiPesananDibayar as $pesan)
                            {!! $pesan !!}
                        @endforeach --}}
                        @foreach ($notifikasiPesananDibuat as $pesan)
                            {!! $pesan !!}
                        @endforeach
                    </div>
                </div>
            </div>
    </section>
@endsection
