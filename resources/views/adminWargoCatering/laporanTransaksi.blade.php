@extends('adminWargoCatering.layouts.main')

@section('container')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Tabel Laporan Transaksi</h4>
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
                    <a href="/dashboard/laporan-transaksi">Tabel</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <form class="mb-4" action="/dashboard/laporan-transaksi" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="start_date">Mulai Tanggal</label>
                                <input type="date" name="start_date" class="form-control" value="{{ $startDate }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="end_date">Sampai Tanggal</label>
                                <input type="date" name="end_date" class="form-control" value="{{ $endDate }}">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-success ml-2" onclick="printSummary()"><i class="fas fa-print"></i>Cetak
                            Laporan</button>



                        @if (count($laporan) > 0)
                            <div class="table-responsive" id="print-section">
                                <div class="col-md-12 py-3">
                                    <div class="text-center">
                                        <img src="/assets/img/logo-wargo-catering2.png"
                                            style="width: 130px; height: 130px; object-fit: cover" alt="">
                                        <p class="pt-3 fs-24 fw-bold">WARGO CATERING</p>
                                        <p class="fs-16 mt-0">Laporan Transaksi per
                                            {{ \Carbon\Carbon::parse($startDate)->isoFormat('dddd, DD MMMM YYYY') }} -
                                            {{ \Carbon\Carbon::parse($endDate)->isoFormat('dddd, DD MMMM YYYY') }}</p>
                                        <hr>
                                    </div>
                                </div>
                                <table class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No. </th>
                                            <th>Nomor Pesanan</th>
                                            <th>Tgl. Transaksi</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Status</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $i = 1;
                                        $totalHargaSemua = 0;
                                    @endphp
                                    <tbody>
                                        @foreach ($laporan as $laporan)
                                            <tr class="text-center">
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $laporan->nomor_pesanan }}</td>
                                                <td>{{ \Carbon\Carbon::parse($laporan->tanggal_pesanan_dibuat)->isoFormat('dddd, DD MMMM YYYY') }}
                                                </td>
                                                <td>{{ $laporan->user->name }}</td>
                                                <td>{{ $laporan->status_pesanan }}</td>
                                                <td>Rp
                                                    {{ number_format($laporan->total_harga, 0, ',', '.') }}</td>
                                            </tr>
                                            @php
                                                $totalHargaSemua += $laporan->total_harga; // Menambahkan total harga pesanan saat ini
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-right mr-4">
                                    <p class="fw-bold fs-20 text-orange">Total Pemasukan: Rp
                                        {{ number_format($totalHargaSemua, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        @else
                            <div class="text-center">
                                <img src="/assets/img/empty-cart.png" style="width: 500px; height: 400px;" alt="">
                                <p class="fs-24 fw-bold">"Tidak ada transaksi "</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printSummary() {
            var printContents = document.getElementById('print-section').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
