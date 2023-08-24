@extends('adminWargoCatering.layouts.main')

@section('container')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Tabel Peminjaman Alat</h4>
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
                    <a href="/dashboard/peminjaman-alat">Tabel</a>
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
                        <a href="/dashboard/peminjaman-alat/create" style="text-decoration: none"><i
                                class="fas fa-plus"></i>
                            Tambah Peminjaman Alat</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        {{-- <th>Nomor Pesanan</th> --}}
                                        <th>Status</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjamanAlat as $peminjaman)
                                        <tr class="text-center">
                                            <td>{{ $id++ }}</td>
                                            <td>{{ $peminjaman->pesanan->user->name }}</td>
                                            {{-- <td>{{ $peminjaman->pesanan->nomor_pesanan }}</td> --}}
                                            <td>
                                                @if ($peminjaman->status == 'Sedang Dipinjam')
                                                    <a href="#" class="btn btn-info btn-sm fs-14">Sedang Dipinjam</a>
                                                @else
                                                    <a href="#" class="btn btn-success btn-sm fs-14">Sudah
                                                        Dikembalikan</a>
                                                @endif

                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($peminjaman->created_at)->isoFormat('dddd, DD MMMM YYYY') }}
                                            </td>
                                            <td class="row justify-content-center align-items-center">
                                                <a href="/dashboard/peminjaman-alat/{{ $peminjaman->id }}/show"
                                                    class="mx-2 btn btn-primary">Detail</a>
                                                <button type="button" class="btn btn-warning fs-14" data-toggle="modal"
                                                    data-target="#statusModal_{{ $peminjaman->id }}">
                                                    Ubah Status
                                                </button>
                                            </td>
                                            <!-- Modal -->
                                            <div class="modal fade" id="statusModal_{{ $peminjaman->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="statusModalLabel_{{ $peminjaman->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-semibold"
                                                                id="statusModalLabel_{{ $peminjaman->id }}">Ubah
                                                                Status dan Catatan</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/dashboard/peminjaman-alat/{{ $peminjaman->id }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('put')
                                                                <div class="mb-3">
                                                                    <label for="status" class="form-label">Status</label>
                                                                    <select name="status" class="form-select form-control"
                                                                        required>
                                                                        <option value="Sudah Dikembalikan">Sudah
                                                                            Dikembalikan</option>
                                                                        <option value="Sedang Dipinjam">Sedang Dipinjam
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="catatan"
                                                                        class="form-label 
                                                                            ">Catatan</label>
                                                                    <input id="catatan" type="hidden" name="catatan"
                                                                        required>
                                                                    <trix-editor input="catatan"></trix-editor>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-success btn-sm fs-14">Ubah
                                                                    Status</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
