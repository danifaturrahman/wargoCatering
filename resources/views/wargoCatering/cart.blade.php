@extends('wargoCatering.layouts.main')


@section('container')
    <!-- cart + summary -->
    <section class="bg-light py-5">
        <div class="container">
            <form action="/update-jumlah" method="post">
                @csrf
                <div class="row">
                    <!-- cart -->
                    <div class="col-lg-9">
                        <div class="card border shadow-0">
                            <div class="m-4">
                                <p class="card-title mb-5 fw-medium fs-24">Keranjang Belanja Anda</p>

                                @php
                                    $totalHarga = 0;
                                @endphp

                                @if (session()->has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                @if (session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <script>
                                    // Check if the error message is present in the session flash data
                                    const errorMessage = @json(session('gagal'));

                                    // If there's an error message, show it as a modal
                                    if (errorMessage) {
                                        alert(errorMessage);
                                    }
                                </script>

                                @forelse ($cart as $menu)
                                    <div class="row gy-3 mb-4">
                                        <div class="col-lg-5">
                                            <div class="me-lg-5">
                                                <div class="d-flex">
                                                    <img src="{{ asset('storage/' . $menu->menu->gambar) }}"
                                                        class="border rounded me-3"
                                                        style="width: 96px; height: 96px; object-fit: cover" />
                                                    <div class="">
                                                        <a href="#" class="nav-link">{{ $menu->menu->nama }}</a>
                                                        <p class="text-muted">{{ $menu->menu->kategori->nama }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                            <div class="">
                                                <input type="number" style="width: 100px;" class="form-control me-4"
                                                    name="jumlah[{{ $menu->id }}]" min="15"
                                                    value="{{ $menu->jumlah }}" data-harga="{{ $menu->menu->harga }}"
                                                    oninput="updateTotalHarga(this)">
                                            </div>
                                            <div class="">
                                                <text class="h6">Rp
                                                    {{ number_format($menu->menu->harga * $menu->jumlah, 0, ',', '.') }}</text>
                                                <br />
                                                <small class="text-muted text-nowrap"> Rp
                                                    {{ number_format($menu->menu->harga, 0, ',', '.') }} / per item </small>
                                            </div>
                                        </div>
                                        <div
                                            class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                            <div class="float-md-end">

                                                <a href="/cart/remove/{{ $menu->menu_id }}"
                                                    class="btn btn-light border text-danger icon-hover-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini dari keranjang belanja?')">
                                                    Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $totalHarga += $menu->menu->harga * $menu->jumlah;
                                    @endphp
                                @empty
                                    <div class="alert alert-info">
                                        Keranjang belanja Anda kosong. Silakan tambahkan menu ke keranjang.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <!-- cart -->
                    <!-- summary -->
                    <div class="col-lg-3">
                        <div class="card shadow-0 border">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Total Harga:</p>
                                    <p class="mb-2 fw-bold" id="totalHarga">Rp
                                        {{ number_format($totalHarga, 0, ',', '.') }}
                                    </p>

                                </div>
                                <hr />
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-success w-100 shadow-0 mb-2">Buat Pesanan</button>
                                    <a href="/menu" class="btn btn-light w-100 border mt-2"> Lanjut Belanja </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- summary -->
                </div>
            </form>
        </div>
    </section>

    <script>
        function updateTotalHarga(inputElement) {
            var totalHarga = 0;

            // Ambil semua input element dengan name="jumlah"
            var inputElements = document.querySelectorAll('[name^="jumlah["]');

            // Loop melalui setiap input element untuk menghitung total harga dan update harga per item
            inputElements.forEach(function(inputElement) {
                var hargaPerItem = parseFloat(inputElement.getAttribute('data-harga'));
                var jumlah = parseInt(inputElement.value);
                var totalHargaPerItem = hargaPerItem * jumlah;

                // Tampilkan total harga per item dengan format Rp xxx.xxx
                var totalHargaPerItemFormatted = formatNumber(totalHargaPerItem);
                var hargaElement = inputElement.closest('.row').querySelector('.h6');
                hargaElement.innerText = 'Rp ' + totalHargaPerItemFormatted;

                totalHarga += totalHargaPerItem;
            });

            // Tampilkan total harga dengan format Rp xxx.xxx
            var totalHargaFormatted = formatNumber(totalHarga);

            // Update teks total harga pada elemen dengan ID "totalHarga"
            var totalHargaElement = document.getElementById('totalHarga');
            totalHargaElement.innerText = 'Rp ' + totalHargaFormatted;
        }

        // Fungsi untuk memformat angka menjadi format Rp xxx.xxx
        function formatNumber(number) {
            return number.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Panggil fungsi untuk menghitung total harga saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            updateTotalHarga();
        });
    </script>
@endsection
