@extends('wargoCatering.layouts.main')

@section('container')
    <section>
        <div class="container">
            <div class="row p-5 ">
                <div class="col-lg-3">
                    <div class="container border border-secondary-subtle p-3">
                        <div class="row mb-3">
                            <div class="col-2">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="col-9">
                                <a href="/user-dashboard-profile" class="text-decoration-none">Profile</a>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="col-10">
                                <a href="/user-dashboard-order" class="text-decoration-none">Pesanan</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="col-10">
                                <a href="/user-dashboard-notification" class="text-decoration-none">Notifikasi</a>
                            </div>
                        </div>
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
