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
                Tambah Ongkos Kirim Baru
            </p>
        </div>
        <form action="/dashboard/ongkos-kirim/{{ $ongkir->id }}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="daerah" class="form-label fw-semibold">Nama Daerah</label>
                <input type="text"
                    class="form-control w-50
                @error('daerah')
                    is-invalid
                @enderror"
                    id="daerah" name="daerah" autofocus value="{{ old('daerah', $ongkir->daerah) }}">
                @error('daerah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga_ongkir">Harga Ongkos Kirim</label>
                <input class="form-control w-50 @error('harga_ongkir')
                is-invalid
            @enderror"
                    type="number" name="harga_ongkir" id="harga_ongkir_input"
                    value="{{ old('harga_ongkir', $ongkir->harga_ongkir) }}">
                @error('harga_ongkir')
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
@endsection
