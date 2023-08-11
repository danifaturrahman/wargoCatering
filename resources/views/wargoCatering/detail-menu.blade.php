@extends('wargoCatering.layouts.main')

@section('container')
    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q"
                        placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid detail-menu-img" src="{{ asset('storage/' . $menu->gambar) }}"
                            alt="Card image cap" id="product-detail">
                    </div>

                </div>
                <!-- col end -->

                <div class="col-lg-7 mt-5">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{ $menu->nama }}</h1>
                            <p class="h3 py-2">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Kategori:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{ $menu->kategori->nama }}</strong></p>
                                </li>
                            </ul>

                            <h6>Deskripsi:</h6>
                            <p>{!! $menu->deskripsi !!}</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Minimal Pembelian :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>15 Porsi</strong></p>
                                </li>
                            </ul>

                            <form action="/add-to-cart" method="POST" class="row g-3">
                                @csrf
                                <input type="text" id="menu_id" name="menu_id" class="form-control"
                                    value="{{ $menu->id }}" hidden>

                                {{-- <input type="text" id="nama" name="nama" class="form-control"
                                    value="{{ $menu->nama }}" hidden>

                                <input type="text" id="harga" name="harga" class="form-control"
                                    value="{{ $menu->harga }}" hidden>

                                <input type="text" id="kategori" name="kategori" class="form-control"
                                    value="{{ $menu->kategori->nama }}" hidden>

                                <input type="text" id="gambar" name="gambar" class="form-control"
                                    value="{{ $menu->gambar }}" hidden> --}}
                                <div class="input-group mb-5" style="width: 30%">
                                    <label for="jumlah" class="input-group-text">Jumlah:</label>
                                    <input type="number" id="jumlah" name="jumlah" class="form-control text-center"
                                        min="15" max="100" value="15">
                                </div>

                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg rounded-pill" name="addToCart"
                                            value="addtocard" onclick="addToCart()">Masukkan Keranjang</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Menu {{ $menu->kategori->nama }} Lainnya</h4>
            </div>

            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product">
                @foreach ($kategori as $kategori)
                    <div class="p-2 pb-3">
                        <div class="product-wap card rounded-4">
                            <div class="card">
                                <img class="card-img img-fluid card-menu-lainnya"
                                    src="{{ asset('storage/' . $kategori->gambar) }}" class="img-fluid">
                                <div
                                    class="card-img-overlay product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white mt-2"
                                                href="/kategori/{{ $kategori->id }}"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="/kategori/{{ $kategori->id }}"
                                    class="fw-semibold text-decoration-none">{{ $kategori->nama }}</a>
                                <p class="mt-2">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </section>
    <!-- End Article -->
    <script>
        function addToCart() {
            var jumlahInput = document.getElementById('jumlah');
            var jumlah = jumlahInput.value;

            // You can perform further actions here, like adding the item to the cart using JavaScript or making an AJAX request to the server to add the item to the cart.
            // For this example, let's just show an alert with the selected jumlah:
            alert('Added ' + jumlah + ' item(s) to cart.');
        }
    </script>
@endsection
