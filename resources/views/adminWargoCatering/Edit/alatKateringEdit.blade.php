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
                Tambah Alat Katering Baru
            </p>
        </div>
        <form action="/dashboard/alat-katering/{{ $alat->id }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text"
                    class="form-control w-50 
                @error('nama')
                    is-invalid
                @enderror"
                    id="nama" name="nama" autofocus value="{{ old('nama', $alat->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="gambar" class="form-label">
                    Gambar</label>
                <img class="img-preview img-fluid m-3" style="max-width: 150px; max-height: 150px; object-fit: cover">
                <input type="hidden" name="oldGambar" value="{{ $alat->gambar }}">
                @if ($alat->gambar)
                    <img src="{{ asset('storage/' . $alat->gambar) }}" class="img-preview img-fluid m-3"
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
