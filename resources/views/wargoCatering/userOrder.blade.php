@extends('wargoCatering.layouts.main')

@section('container')
    <section>
        <div class="container-fluid">
            <div class="row p-5 ">
                <div class="col-3">
                    <div class="container p-3 border border-secondary-subtle">
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

                @php
                    $id = 1;
                @endphp

                <div class="col-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="basic-datatables" class="display table table-striped table-hover">
                                            <thead>
                                                <tr class="text-center fs-16">
                                                    <th>No</th>
                                                    <th>Tanggal Transaksi</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pesanan as $pesanan)
                                                    <tr class="text-center fs-16">
                                                        <td>{{ $id++ }}</td>
                                                        <td>{{ $pesanan->tanggal_pesanan_dibuat }}</td>
                                                        <td>
                                                            @if ($pesanan->status_pesanan === 'Belum Dibayar')
                                                                <a class="btn btn-info btn-sm fs-16">
                                                                    {{ $pesanan->status_pesanan }}
                                                                </a>
                                                            @endif
                                                            @if ($pesanan->status_pesanan === 'Menunggu Pelunasan')
                                                                <a class="btn btn-danger btn-sm fs-16">
                                                                    {{ $pesanan->status_pesanan }}
                                                                </a>
                                                            @endif
                                                            @if ($pesanan->status_pesanan === 'Lunas')
                                                                <a class="btn btn-success btn-sm fs-16">
                                                                    {{ $pesanan->status_pesanan }}
                                                                </a>
                                                            @endif
                                                        </td>
                                                        <td>Rp
                                                            {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                                                        </td>
                                                        <td class="d-flex justify-content-center">
                                                            <a href="/invoice/{{ $pesanan->id }}"
                                                                class="btn btn-primary btn-sm fs-16">Nota</a>
                                                            {{-- <form action="/invoice/{{ $pesanan->id }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-sm fs-16">Nota</button>
                                                            </form> --}}
                                                            @if ($pesanan->status_pesanan === 'Belum Dibayar')
                                                                <form class="mx-2"
                                                                    action="/payment-dp/{{ $pesanan->id }}" method="get">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-success btn-sm fs-16">Bayar
                                                                        DP</button>
                                                                </form>
                                                            @endif
                                                            @if ($pesanan->status_pesanan === 'Menunggu Pelunasan')
                                                                <form class="mx-2"
                                                                    action="/payment-pelunasan/{{ $pesanan->id }}"
                                                                    method="get">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-sm fs-16">Bayar
                                                                        Pelunasan</button>
                                                                </form>
                                                            @endif
                                                            @if ($pesanan->status_pesanan === 'Lunas')
                                                                <a class="btn btn-warning btn-sm mx-2 fs-16">Penilaian</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
