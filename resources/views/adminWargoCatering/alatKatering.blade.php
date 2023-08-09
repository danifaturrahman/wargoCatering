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
        {{-- @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif --}}
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
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alat as $alat)
                                        <tr class="text-center">
                                            <td>{{ $alat->id }}</td>
                                            <td>{{ $alat->nama }}</td>
                                            <td class="text-center"><img src="{{ asset('storage/' . $alat->gambar) }}"
                                                    style="height: 100px; width: 100px; object-fit: cover"></td>
                                            <td class="row d-flex align-items-center">
                                                <a href="/dashboard/keunggulan/1" class="mx-auto" style="color: blue;"><i
                                                        class="fas fa-eye"></i></a>
                                                <a href="/dashboard/keunggulan/1/edit" class="mx-auto"
                                                    style="color: blue"><i class="fas fa-edit"></i></a>
                                                <form class="mx-auto" action="/dashboard/keunggulan/1" method="POST"
                                                    class="pr-2">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="p-0 border-0 btn" style="color: blue;" type="submit"
                                                        onclick="return confirm('Apakah anda yakin?')"><i
                                                            class="fas fa-times"></i></button>
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
