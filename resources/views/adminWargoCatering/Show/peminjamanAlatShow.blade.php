@extends('adminWargoCatering.layouts.main')

@section('container')
    <div class="container p-5">
        <div class="card">
            <div class="container mb-5 mt-3">
                <div class="container" id="print-section">
                    <div class="col-md-12 py-3">
                        <div class="text-center">
                            <img src="/assets/img/logo-wargo-catering2.png"
                                style="width: 150px; height: 150px; object-fit: cover" alt="">
                            <p class="py-3 fs-24 fw-bold">WARGO CATERING</p>
                            <hr>
                        </div>
                    </div>
                    <div class="row" style="letter-spacing: 0.3px">
                        <div class="col-xl-7" id="peminjam-section">
                            <p class="text-muted fw-bold">Peminjam</p>
                            <ul class="list-unstyled">
                                <li class="text-orange mb-2"><span class="text-muted fw-medium fs-18">Nama:
                                    </span>{{ $peminjaman->pesanan->user->name }}</li>
                                <li class="text-muted mb-2"><span class="fw-medium fs-18">Email:
                                    </span>{{ $peminjaman->pesanan->user->email }}
                                </li>
                                <li class="text-muted mb-2"><span class="fw-medium fs-18">No. Telepon:
                                    </span>{{ $peminjaman->pesanan->user->telepon }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-5" id="ringkasan-section">
                            <p class="text-muted fw-bold">Ringkasan Peminjaman</p>
                            <ul class="list-unstyled">
                                <li class="text-muted mb-2"><i class="fas fa-circle" style="color:#C15E28 ;"></i> <span
                                        class="fw-medium fs-18">No. Pesanan:
                                    </span>{{ $peminjaman->pesanan->nomor_pesanan }}</li>
                                <li class="text-muted mb-2"><i class="fas fa-circle" style="color:#C15E28 ;"></i> <span
                                        class="fw-medium fs-18">Tgl. Peminjaman:
                                    </span>{{ \Carbon\Carbon::parse($peminjaman->created_at)->isoFormat('dddd, DD MMMM YYYY') }}
                                </li>
                                <li class="text-muted mb-2"><i class="fas fa-circle" style="color:#C15E28 ;"></i> <span
                                        class="fw-medium fs-18">Tgl. Pengembalian:
                                    </span>
                                    @if ($peminjaman->status == 'Sudah Dikembalikan')
                                        {{ \Carbon\Carbon::parse($peminjaman->update_at)->isoFormat('dddd, DD MMMM YYYY') }}
                                    @else
                                        -
                                    @endif
                                </li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#C15E28;"></i> <span
                                        class="me-1 fw-medium">Status: </span><span class="text-orange fw-bold">
                                        {{ $peminjaman->status }}</span></li>
                            </ul>
                        </div>
                        <hr>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Alat</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman->peminjamanAlatDetail as $detail)
                                <tr>
                                    <td>{{ $detail->nama_alat }}</td>
                                    <td>{{ $detail->jumlah }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right mr-5 mb-5 mt-5">
                        <p class="fs-16 fw-bold mb-5">Tanda tangan</p>
                        <p class="fs-16">{{ $peminjaman->pesanan->user->name }}</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="row py-2">
            <div class="col-xl-8">
                <div class="col-10 p-3" style="background-color: rgb(223, 223, 255); border-radius: 7px">
                    <p class="fw-bold fs-16">Catatan Pengembalian</p>
                    <p class="text-justify">
                        @empty($peminjaman->catatan)
                            Tidak ada catatan.
                        @endempty
                        {!! $peminjaman->catatan !!}
                </div>
            </div>
            <div class="col-xl-4">
                <div class="col-xl-12 text-right">
                    <button class="btn btn-success btn-sm fs-16" onclick="printSummary()"><i class="fas fa-print"></i> Cetak
                        Ringkasan</button>
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
