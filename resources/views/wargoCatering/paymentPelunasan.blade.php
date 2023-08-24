@extends('wargoCatering.layouts.main')

@section('container')
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

    <section class="bg-light">
        <div class="container py-5">
            <div class="card p-3">
                <div class="text-center">
                    <img src="/assets/img/logo-wargo-catering2.png" style="width: 150px; height: 150px; object-fit: cover"
                        alt="">
                    <p class="py-3 fs-24 fw-bold text-orange">HALAMAN PEMBAYARAN</p>
                    <hr>
                </div>
                <div class="row my-2 mx-1 justify-content-center">
                    <p class="fs-20 fw-semibold text-center">PESANAN ANDA</p>
                    @foreach ($pesanan->detail_pesanan as $detail_pesanan)
                        <div class="col-md-2 mb-4 mb-md-0">
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $detail_pesanan->menu->gambar) }}" class="rounded-3 mb-3"
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
                    @endforeach
                </div>
                <hr>
                <div class="col-xl-12 text-center py-3">
                    <ul class="list-unstyled">
                        <li class="text-muted"><span class="text-black me-4">SubTotal</span>Rp.
                            {{ number_format($pesanan->total_harga - $pesanan->harga_pengiriman, 0, ',', '.') }}
                        </li>
                        <li class="text-muted mt-2"><span class="text-black me-4">Ongkos kirim</span>Rp.
                            {{ number_format($pesanan->harga_pengiriman, 0, ',', '.') }}</li>
                    </ul>
                    <p class="text-black"><span class="text-black fw-bold me-3"> Total Harga</span><span
                            class="text-orange fw-bold fs-24">Rp.
                            {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span></p>
                    <p class="text-black"><span class="text-black fw-bold me-3"> Total Pelunasan</span><span
                            class="text-orange fw-bold fs-24">Rp.
                            {{ number_format($pesanan->total_harga / 2, 0, ',', '.') }}</span></p>
                </div>
                <button id="pay-button" class="btn btn-success btn-lg fs-20 mb-3">Bayar Disini!</button>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("Pembayaran berhasil!");
                    window.location.href = '/user-dashboard-order';
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
@endsection
