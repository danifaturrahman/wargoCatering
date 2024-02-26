@extends('adminWargoCatering.layouts.main')

@section('container')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Tabel Alat Katering</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="/dashboard">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/alat-katering">Tabel</a>
                </li>
            </ul>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @php
            $id = 1;
        @endphp
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/dashboard/alat-katering/create" style="text-decoration: none"><i class="fas fa-plus"></i>
                            Tambah Alat Katering</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Gambar</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alat as $alat)
                                        <tr class="text-center">
                                            <td>{{ $id++ }}</td>
                                            <td>{{ $alat->nama }}</td>
                                            <td class="text-center"><img src="{{ asset('storage/' . $alat->gambar) }}"
                                                    style="height: 100px; width: 100px; object-fit: cover"></td>
                                            <td>{{ $alat->jumlah }}</td>
                                            <td class="row justify-content-center align-items-center">
                                                {{-- <a href="/dashboard/alat-katering/{{ $alat->id }}"
                                                    class=" btn btn-primary">Detail</a> --}}
                                                <a href="/dashboard/alat-katering/{{ $alat->id }}/edit"
                                                    class=" btn btn-warning mx-2">Update</a>
                                                <form action="/dashboard/alat-katering/{{ $alat->id }}" method="POST"
                                                    class="pr-2">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" type="submit"
                                                        onclick="return confirm('Apakah anda yakin ingin menghapusnya?')">Hapus</button>
                                                </form>
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
@endsection
