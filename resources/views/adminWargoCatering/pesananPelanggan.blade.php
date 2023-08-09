@extends('adminWargoCatering.layouts.main')

@section('container')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Tabel Pesanan Pelanggan</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="/dashboard">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/pesanan-pelanggan">Tabel</a>
                </li>
            </ul>
        </div>
        {{-- @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Tgl. Transaksi</th>
                                        <th>Pelanggan</th>
                                        <th>Status</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanan as $pesanan)
                                        <tr class="text-center">
                                            <td>{{ $pesanan->id }}</td>
                                            <td>{{ $pesanan->tanggal_pesanan_dibuat }}</td>
                                            <td>{{ $pesanan->user->name }}</td>
                                            <td>{{ $pesanan->status_pesanan }}</td>
                                            <td>Rp
                                                {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-sm fs-16">Detail</a>
                                                <a href="" class="btn btn-success btn-sm fs-16">Pembayaran</a>
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
@endsection
