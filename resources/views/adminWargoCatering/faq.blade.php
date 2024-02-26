@extends('adminWargoCatering.layouts.main')

@section('container')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Tabel FAQ</h4>
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
                    <a href="/dashboard/faq">Tabel</a>
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
                        <a href="/dashboard/faq/create" style="text-decoration: none"><i class="fas fa-plus"></i>
                            Tambah FAQ</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faq as $faq)
                                        <tr class="text-center">
                                            <td>{{ $id++ }}</td>
                                            <td>{{ Str::limit($faq->pertanyaan, 20) }}</td>
                                            <td>{!! Str::limit($faq->deskripsi, 20) !!}</td>
                                            <td class="row justify-content-center align-items-center">
                                                <a href="" class="btn btn-primary fs-16">Detail</a>
                                                <a href="/dashboard/faq/{{ $faq->id }}/edit"
                                                    class=" btn btn-warning mx-2">Update</a>
                                                <form action="/dashboard/faq/{{ $faq->id }}" method="POST"
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
