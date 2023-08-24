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
                    <a href="/dashboard/data-pelanggan">Tabel</a>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No. Telepon</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelanggan as $pelanggan)
                                        <tr class="text-center">
                                            <td>{{ $id++ }}</td>
                                            <td>{{ $pelanggan->name }}</td>
                                            <td>
                                                @empty($pelanggan->telepon)
                                                    Nomor telepon kosong.
                                                @endempty
                                                {{ $pelanggan->telepon }}
                                            </td>
                                            <td>{{ $pelanggan->email }}</td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-sm fs-16">Detail</a>
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
