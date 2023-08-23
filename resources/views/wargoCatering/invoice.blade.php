@extends('wargoCatering.layouts.main')

@section('container')
    <div class="container p-5">
        <div class="card">
            <div class="container mb-5 mt-3">
                <div class="container">
                    <div class="col-md-12 py-3">
                        <div class="text-center">
                            <img src="/assets/img/logo-wargo-catering2.png"
                                style="width: 150px; height: 150px; object-fit: cover" alt="">
                            <p class="py-3 fs-24 fw-bold">WARGO CATERING</p>
                            <hr>
                        </div>
                    </div>
                    <div class="row" style="letter-spacing: 0.3px">
                        <div class="col-xl-7">
                            <p class="text-muted fw-bold">Pelanggan</p>
                            <ul class="list-unstyled">
                                <li class="text-orange mb-2"><span class="text-muted fw-medium fs-18">Nama:
                                    </span>{{ $pesanan->user->name }}</li>
                                <li class="text-muted mb-2"><span class="fw-medium fs-18">Email:
                                    </span>{{ $pesanan->user->email }}
                                </li>
                                <li class="text-muted mb-2"><span class="fw-medium fs-18">Alamat:
                                    </span>{{ $pesanan->user->alamat }}
                                </li>
                                <li class="text-muted"><span class="me-1 fw-medium">No. Telepon: </span>
                                    {{ $pesanan->user->telepon }}</li>
                            </ul>
                        </div>
                        <div class="col-xl-5">
                            <p class="text-muted fw-bold">Invoice</p>
                            <ul class="list-unstyled">
                                <li class="text-muted mb-2"><i class="fas fa-circle" style="color:#C15E28 ;"></i> <span
                                        class="fw-medium fs-18">No. Pesanan: </span>{{ $pesanan->nomor_pesanan }}</li>
                                <li class="text-muted mb-2"><i class="fas fa-circle" style="color:#C15E28 ;"></i> <span
                                        class="fw-medium fs-18">Tgl. Transaksi:
                                    </span>{{ $tanggal_transaksi }}
                                </li>
                                <li class="text-muted mb-2"><i class="fas fa-circle" style="color:#C15E28 ;"></i> <span
                                        class="fw-medium fs-18">Tgl. Ambil / Antar:
                                    </span>{{ $tanggal_dikirim }}
                                </li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#C15E28;"></i> <span
                                        class="me-1 fw-medium">Status: </span><span
                                        class="badge bg-warning text-black fw-bold">
                                        {{ $pesanan->status_pesanan }}</span></li>
                            </ul>
                        </div>
                        <hr>
                    </div>
                    @foreach ($pesanan->detail_pesanan as $detail_pesanan)
                        <div class="row my-2 mx-1 justify-content-center">
                            <div class="col-md-2 mb-4 mb-md-0">
                                <div class="text-center">
                                    <img src="{{ asset('storage/' . $detail_pesanan->menu->gambar) }}" class="rounded-3"
                                        style="width: 110px; height: 100px; object-fit: cover;"
                                        alt="{{ $detail_pesanan->menu->nama }}" />
                                    <a href="#!">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: hsla(0, 0%, 98.4%, 0.2)"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7 mb-4 mb-md-0">
                                <p class="fw-bold">{{ $detail_pesanan->menu->nama }}</p>
                                <p class="mb-1">
                                    <span class="text-muted me-2">Jumlah: </span><span>{{ $detail_pesanan->jumlah }}</span>
                                </p>
                            </div>
                            <div class="col-md-3 mb-4">
                                <div class="mb-2"><span class="align-middle">Harga Menu: <span class="text-muted ">Rp.
                                            {{ number_format($detail_pesanan->menu->harga, 0, ',', '.') }}</span></span>
                                </div>
                                <div class="mb-2"><span class="align-middle">Total: <span class="text-orange fw-bold">Rp.
                                            {{ number_format($detail_pesanan->harga, 0, ',', '.') }}</span> </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <hr>
                    <div class="row py-2">
                        <div class="col-xl-8">
                            @if ($pesanan->status_pesanan == 'Belum Dibayar')
                                <div class="col-10 rounded-3 p-3" style="background-color: rgb(223, 223, 255)">
                                    <p class="text-justify">
                                        <span class="fw-bold">Terima kasih telah melakukan pemesanan.</span> Untuk
                                        menyelesaikan
                                        proses pesanan Anda, silahkan lakukan pembayaran <span class="fw-bold">Uang
                                            Muka</span> sebesar <span class="fw-bold text-orange">Rp.
                                            {{ number_format($pesanan->total_harga / 2, 0, ',', '.') }}.</span>
                                    </p>
                                    <hr>
                                    <p>Total harga dari pesanan Anda sebesar <span class="fw-bold text-orange">Rp.
                                            {{ number_format($pesanan->total_harga, 0, ',', '.') }}.</span></p>
                                </div>
                            @endif
                            @if ($pesanan->status_pesanan == 'Menunggu Pelunasan')
                                <div class="col-10 rounded-3 p-3" style="background-color: rgb(223, 223, 255)">
                                    <p class="text-justify">
                                        <span class="fw-bold">Terima kasih telah melakukan pembayaran uang muka.</span>
                                        Pesanan Anda akan segera kami proses, silahkan lakukan pembayaran <span
                                            class="fw-bold">Pelunasan</span> sebesar <span class="fw-bold text-orange">Rp.
                                            {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span> sebelum <span
                                            class="fw-bold">H-1</span> pesanan dikirim atau pesanan akan <span
                                            class="text-danger fw-bold">Dibatalkan</span>.
                                    </p>
                                </div>
                            @endif
                            @if ($pesanan->status_pesanan == 'Lunas')
                                <div class="col-10 rounded-3 p-3" style="background-color: rgb(223, 223, 255)">
                                    <p class="text-justify">
                                        <span class="fw-bold">Terima kasih telah menyelesaikan proses pembayaran.</span>
                                        Pesanan Anda akan kami kirimkan sesuai tanggal yang sudah ditentukan, nikmati menu
                                        kami dan kami tunggu pesanan berikutnya.
                                    </p>
                                    <hr>
                                    <p>Total harga dari pesanan Anda sebesar <span class="fw-bold text-orange">Rp.
                                            {{ number_format($pesanan->total_harga, 0, ',', '.') }}.</span></p>
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-4">
                            <ul class="list-unstyled">
                                <li class="text-muted text-end"><span class="text-black me-4">SubTotal</span>Rp.
                                    {{ number_format($pesanan->total_harga - $pesanan->harga_pengiriman, 0, ',', '.') }}
                                </li>
                                <li class="text-muted text-end mt-2"><span class="text-black me-4">Ongkos kirim</span>Rp.
                                    {{ number_format($pesanan->harga_pengiriman, 0, ',', '.') }}</li>
                            </ul>
                            <p class="text-black text-end"><span class="text-black fw-bold me-3"> Total Harga</span><span
                                    class="text-orange fw-bold fs-24">Rp.
                                    {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span></p>
                            <div class="col-xl-12 text-end">
                                @if ($pesanan->status_pesanan == 'Belum Dibayar')
                                    <a class="btn btn-success fs-20" href="/payment-dp/{{ $pesanan->id }}">Bayar
                                        DP</a>
                                @endif
                                @if ($pesanan->status_pesanan == 'Menunggu Pelunasan')
                                    <a class="btn btn-success fs-20" href="/payment-pelunasan/{{ $pesanan->id }}">Bayar
                                        Lunas</a>
                                @endif
                                @if ($pesanan->status_pesanan === 'Lunas')
                                    <a class="btn btn-warning fs-20">Penilaian</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
