@extends('wargoCatering.layouts.main')

@section('container')
    <section class="bg-white d-flex align-items-center">
        <div class="container-fluid">
            <div class="row p-5 ">
                <div class="row pb-2 text-center">
                    <p class="text-orange fw-bold fs-20 m-0">Dashboard Pelanggan</p>
                    <p class="fs-28 fw-bold title-section">
                        Detail pesanan pelanggan Wargo Catering.
                    </p>
                </div>

                @php
                    $id = 1;
                @endphp

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="basic-datatabless" class="display table table-striped table-hover">
                                            <thead>
                                                <tr class="text-center fs-16">
                                                    <th>No</th>
                                                    <th>No. Pesanan</th>
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
                                                        <td>{{ $pesanan->nomor_pesanan }}</td>
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
                                                                <!-- Button to open modal -->
                                                                <button type="button"
                                                                    class="btn btn-warning btn-sm mx-2 fs-16"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#ratingModal">Penilaian</button>

                                                                <!-- Rating Modal -->
                                                                <div class="modal fade text-start" id="ratingModal"
                                                                    tabindex="-1" aria-labelledby="ratingModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="ratingModalLabel">Beri Penilaian
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <!-- Form for rating -->
                                                                                <form action="/testimoni" method="post">
                                                                                    @csrf
                                                                                    <div class="mb-3">
                                                                                        <label for="ulasan"
                                                                                            class="form-label">Ulasan</label>
                                                                                        <textarea class="form-control" id="ulasan" name="ulasan" rows="3" required></textarea>
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="nilai"
                                                                                            class="form-label">Nilai</label>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            id="nilai" name="nilai"
                                                                                            min="1" max="5"
                                                                                            required>
                                                                                    </div>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Kirim
                                                                                        Ulasan</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
