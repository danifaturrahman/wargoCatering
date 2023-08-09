@extends('wargoCatering.layouts.main')

@section('container')
    <section class="p-5 bg-light">
        <div class="container ">

            <form action="/checkout-pesanan" method="POST">
                @csrf
                <div class="row">
                    <div class="col-7 ">
                        <div class="p-3 border border-secondary-subtle rounded-3 bg-white">
                            <!-- Loop through the cart items -->
                            @foreach ($cart as $menu)
                                <div class="row mb-2">
                                    <div class="col-2">
                                        <img src="{{ asset('storage/' . $menu->menu->gambar) }}"
                                            class="rounded-3 border img-fluid"
                                            style="width: 80px; height: 80px; object-fit: cover">
                                    </div>
                                    <div class="col-3">
                                        <p class="fs-5 fw-semibold">{{ $menu->menu->nama }}</p>
                                    </div>
                                    <div class="col-3">
                                        <p class="fs-5 fw-semibold">Rp. {{ number_format($menu->menu->harga, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <p class="fs-5 fw-regular text-muted text-end">{{ $menu->jumlah }}x items</p>
                                    </div>
                                </div>
                            @endforeach
                            <!-- End of loop -->
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <label for="inputname" class="fw-semibold">Nama Lengkap</label>
                                    <input type="text" value="{{ Auth::user()->name }}" class="form-control mt-1"
                                        id="name" name="name" placeholder="Name" readonly>
                                </div>
                                <div class="form-group col-md-6 mb-4">
                                    <label for="inputtelepon" class="fw-semibold">Telepon</label>
                                    <input type="text" value="{{ Auth::user()->telepon }}" class="form-control mt-1"
                                        id="telepon" name="telepon" placeholder="Telepon" readonly>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="inputalamat" class="fw-semibold">Alamat</label>
                                <textarea class="form-control mt-1" id="alamat" name="alamat" placeholder="Alamat" rows="4">{{ Auth::user()->alamat }}</textarea>
                            </div>
                            <div class="row">
                                <div class="form-group mb-4 col-6">
                                    <label for="exampleDropdown" class="fw-semibold">Keterangan</label>
                                    <select name="keterangan" class="form-control" id="exampleDropdown">
                                        <option value="elemen1">Diambil</option>
                                        <option value="elemen2">Diantar</option>
                                    </select>
                                </div>
                                <div class="form-group mb-4 col-6">
                                    <label for="exampleDropdown" class="fw-semibold">Ongkos Kirim</label>
                                    <select name="ongkos_kirim" class="form-control" id="exampleDropdown">
                                        <option value="">- / Rp. 0</option>
                                        <option value="elemen1">Pontianak Selatan</option>
                                        <option value="elemen2">Pontianak Kota</option>
                                        <option value="elemen3">Pontianak Barat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-4 col-6">
                                    <label for="inputtanggal" class="fw-semibold">Tanggal Ambil / Kirim</label>
                                    <input type="date" class="form-control mt-1" id="tanggal" name="tanggal"
                                        placeholder="tanggal">
                                </div>
                                <div class="form-group mb-4 col-6">
                                    <label for="inputjam" class="fw-semibold">Jam Ambil / Kirim</label>
                                    <input type="time" class="form-control mt-1" id="jam" name="jam"
                                        placeholder="jam">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-5">
                        <div class="border p-3 border-secondary-subtle rounded-3 bg-white">
                            <p class="text-center fs-3 fw-bold mb-5">RINGKASAN BELANJA</p>
                            <div class="row mb-3">
                                <p class="col-6 fw-bold">PRODUK</p>
                                <p class="col-6 text-end fw-bold">SUBTOTAL</p>
                            </div>
                            <!-- Loop through the cart items to display the subtotal -->
                            @php
                                $totalHarga = 0;
                            @endphp
                            @foreach ($cart as $menu)
                                @php
                                    $subtotal = $menu->menu->harga * $menu->jumlah;
                                    $totalHarga += $subtotal;
                                @endphp
                                <div class="row mb-1">
                                    <p class="col-6 text-muted">{{ $menu->jumlah }}x {{ $menu->menu->nama }}</p>
                                    <p class="col-6 text-end text-muted">Rp. {{ number_format($subtotal, 0, ',', '.') }}</p>
                                </div>
                            @endforeach
                            <!-- End of loop -->
                            <div class="row mb-5 mt-3">
                                <p class="col-6 fw-bold text-orange">TOTAL BELANJA</p>
                                <p class="col-6 text-end fw-bold text-orange">Rp.
                                    {{ number_format($totalHarga, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="row mb-5">
                                <p class="col-6 fw-bold">ONGKOS KIRIM</p>
                                <p class="col-6 text-end fw-bold">Rp. 60,000</p>
                            </div>
                            @php
                                $ongkir = 60000;
                                $totalHargaPesanan = $totalHarga + $ongkir;
                            @endphp
                            <div class="row mb-4">
                                <p class="col-6 fw-bold text-orange">TOTAL HARGA PESANAN</p>
                                <p class="col-6 fw-bold text-end text-orange">Rp.
                                    {{ number_format($totalHargaPesanan, 0, ',', '.') }}</p>
                            </div>
                            <div class="row px-3">
                                <button type="submit"
                                    class="btn btn-success btn-block btn-lg rounded-pill">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection
