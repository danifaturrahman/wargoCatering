@extends('adminWargoCatering.layouts.main')


@section('container')
    <div class="create-container m-5 p-5 bg-white">
        <div class="col-12 col-lg-6 offset-lg-3 justify-content-center align-items-center row py-2"
            style="background-color: #C15E28; border-radius: 30px;">
            <img src="/assets/img/logo-wargo-catering3.png" style="max-width: 50px; max-height: 50px; object-fit: cover"
                class="" alt="">
            <p class="fw-bold pl-3 text-white fs-24">WARGO CATERING</p>
        </div>
        <hr>
        <div class="fs-2 mb-5 mt-3 ">
            <p class="fs-16 fw-bold text-center">
                Tambah Menu Katering Baru
            </p>
        </div>
        <form action="/dashboard/peminjaman-alat" method="POST">
            @csrf

            <div class="mb-3">
                <label for="pesanan_id" class="form-label fw-bold">Peminjam Alat</label>
                <select class="form-control w-50 @error('pesanan_id')
                is-invalid
            @enderror"
                    id="pesanan_id" name="pesanan_id">
                    <option value="">-- Pilih Peminjam --</option>
                    @foreach ($pesanan as $pesanan)
                        <option value="{{ $pesanan->id }}">{{ $pesanan->user->name }} - No. Pesanan
                            {{ $pesanan->nomor_pesanan }}
                        </option>
                    @endforeach
                </select>
                @error('pesanan_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <table class="table table-bordered w-50">
                <thead>
                    <tr>
                        <th>Nama Alat</th>
                        <th>Jumlah alat </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alat as $alat)
                        <tr>
                            <td>{{ $alat->nama }}</td>
                            <td>
                                <input type="number" name="alat[{{ $alat->id }}]" placeholder="Masukkan jumlah alat"
                                    class="form-control border border-primary">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{-- <tbody>
                    @foreach ($alat as $index => $alat)
                        <tr>
                            <td>
                                <input type="hidden" name="peminjaman[{{ $index }}][nama]"
                                    value="{{ $alat->nama }}">
                                {{ $alat->nama }}
                            </td>
                            <td>
                                <input type="number" placeholder="Masukkan jumlah alat"
                                    name="peminjaman[{{ $index }}][jumlah]"
                                    class="form-control border border-primary">
                            </td>
                        </tr>
                    @endforeach
                </tbody> --}}
            </table>
            <button type="submit" class="btn btn-primary">Tambah Peminjaman Alat</button>
        </form>
    </div>
@endsection
