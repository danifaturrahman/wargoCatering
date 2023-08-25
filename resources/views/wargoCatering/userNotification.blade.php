@extends('wargoCatering.layouts.main')

@section('container')
    <section class="py-5">
        <div class="container">
            <div class="row pt-4 pb-4 text-center">
                <p class="text-orange fw-bold fs-20 m-0">Notifikasi</p>
                <p class="fs-28 fw-bold title-section">
                    Notfikasi pesanan pada Wargo Catering.
                </p>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <ul class="list-group">
                        @forelse ($notifikasi as $notifikasi)
                            <li class="list-group-item {{ $notifikasi->status === 'unread' ? 'font-weight-bold' : '' }}">
                                {{ $notifikasi->pesan }}
                                <br>
                                <small>{{ $notifikasi->created_at->format('d F Y, H:i') }}</small>
                            </li>
                        @empty
                            <li class="list-group-item">Tidak ada notifikasi.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
