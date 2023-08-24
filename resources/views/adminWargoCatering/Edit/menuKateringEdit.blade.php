@extends('adminWargoCatering.layouts.main')

@section('container')
    <div class="create-container w-75 mt-5 ml-5 p-3">
        <div class="col-12 col-lg-6 offset-lg-3 justify-content-center align-items-center row py-2"
            style="background-color: #C15E28; border-radius: 30px;">
            <img src="/assets/img/logo-wargo-catering3.png" style="max-width: 50px; max-height: 50px; object-fit: cover"
                class="" alt="">
            <p class="fw-bold pl-3 text-white fs-24">WARGO CATERING</p>
        </div>
        <hr>
        <div class="fs-2 mb-5 mt-3 ">
            <p class="fs-16 fw-bold text-center">
                Update Menu Katering Baru
            </p>
        </div>
        <form action="/dashboard/menu-katering/{{ $menu->id }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text"
                    class="form-control w-50 
                @error('nama')
                    is-invalid
                @enderror"
                    id="nama" name="nama" autofocus value="{{ old('nama', $menu->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">
                    Gambar</label>
                <img class="img-preview img-fluid m-3" style="max-width: 150px; max-height: 150px; object-fit: cover">
                <input type="hidden" name="oldGambar" value="{{ $menu->gambar }}">
                @if ($menu->gambar)
                    <img src="{{ asset('storage/' . $menu->gambar) }}" class="img-preview img-fluid m-3"
                        style="max-width: 150px; max-height: 150px; object-fit: cover">
                @else
                    <img class="img-preview img-fluid m-3" style="max-width: 150px; max-height: 150px; object-fit: cover">
                @endif
                <input
                    class="form-control w-50 
                    @error('gambar')
                        is-invalid
                    @enderror"
                    type="file" id="gambar" name="gambar" onchange="previewImage()">
                @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Pilih Kategori
                    Katering</label>
                <select class="form-control w-50 @error('kategori_id')
                is-invalid
            @enderror"
                    id="kategori_id" name="kategori_id">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $kategori)
                        <option value="{{ $kategori->id }}" {{ $kategori->id == $menu->kategori_id ? 'selected' : '' }}>
                            {{ $kategori->nama }}</option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga">Harga</label>
                <input class="form-control w-50 @error('harga')
                is-invalid
            @enderror"
                    type="number" name="harga" id="harga_input" value="{{ old('harga', $menu->harga) }}">
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="deskripsi" class="form-label 
                ">Description</label>
                <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $menu->deskripsi) }}"
                    required>
                <trix-editor input="deskripsi"></trix-editor>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
            <a class="text-decoration-none btn btn-warning mb-3 text-white"
                href="{{ URL::previous() }}
                ">Kembali</a>
        </form>

    </div>

    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const gambar = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(gambar.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
