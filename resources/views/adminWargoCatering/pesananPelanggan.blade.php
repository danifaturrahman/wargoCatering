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
                                @php
                                    $i = 1;
                                @endphp
                                <tbody>
                                    @foreach ($pesanan as $pesanan)
                                        <tr class="text-center">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pesanan->tanggal_pesanan_dibuat)->isoFormat('dddd, DD MMMM YYYY') }}
                                            </td>
                                            <td>{{ $pesanan->user->name }}</td>
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
                                                @if ($pesanan->status_pesanan === 'Selesai')
                                                    <a class="btn btn-warning btn-sm fs-16">
                                                        {{ $pesanan->status_pesanan }}
                                                    </a>
                                                @endif
                                            </td>
                                            <td>Rp
                                                {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                                            <td>
                                                <a href="/dashboard/pesanan-pelanggan/{{ $pesanan->id }}/show"
                                                    class="btn btn-primary btn-sm fs-16 mb-2">Detail</a>
                                                @if ($pesanan->status_pesanan === 'Lunas')
                                                    <form action="/ubah-status-selesai/{{ $pesanan->id }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-warning btn-sm fs-16"
                                                            onclick="confirm('Ubah status pesanan menjadi selesai?')">Pesanan
                                                            Selesai</button>
                                                    </form>
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
@endsection
