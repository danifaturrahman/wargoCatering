@extends('wargoCatering.layouts.main')

@section('container')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="row pb-4 text-center">
                    <p class="text-orange fw-bold fs-20 m-0">Dashboard Pelanggan</p>
                    <p class="fs-28 fw-bold title-section">
                        Informasi profil pelanggan Wargo Catering.
                    </p>
                </div>

                <div class="col-md-10 mb-5">
                    <div class="p-4 bg-white shadow rounded-4 mb-6">
                        <div class="">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <div class="col-md-10 mb-3">
                    <div class="p-4 bg-white shadow rounded-4 mb-6">
                        <div class="">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
