@extends('wargoCatering.layouts.main')

@section('container')
    <section class="bg-light">
        <div class="container">
            <div class="row p-5">
                <div class="col-lg-3">
                    <div class="container border border-secondary-subtle p-3 bg-white rounded-2">
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
                    <div class="container border border-secondary-subtle p-3 bg-white rounded-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <p style="font-size: 20px">Nama : {{ Auth::user()->name }}</p>
                                    <p style="font-size: 20px">Email : {{ Auth::user()->email }}</p>
                                    <p style="font-size: 20px">Alamat : {{ Auth::user()->alamat }}</p>
                                    <p style="font-size: 20px">Telepon : {{ Auth::user()->telepon }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
