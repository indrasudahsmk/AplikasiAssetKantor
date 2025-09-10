@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user"></i>
        {{ $title }}
    </h1>
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
            <div class="mb-1 mr-2">
                <a href="{{ route('userCreate') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Data
                </a>
            </div>
            <div>
                <a href="{{ route('userExcel') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-file-excel mr-2"></i>
                    Excel
                </a>
                <a href="{{ route('userPdf') }}" class="btn btn-danger btn-sm">
                    <i class="fas fa-file-pdf mr-2" target='__blank'></i>
                    PDF
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>NIP / NIK</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Jabatan</th>
                            <th>Role</th>
                            <th>Bidang</th>
                            <th>Status Pegawai</th>
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    <span class="badge badge-info badge-pill">
                                        {{ $item->nip_nik }}
                                    </span>
                                </td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->username }}</td>
                                <td class="text-center">
                                    {{ $item->jabatan->jabatan }}
                                </td>
                                <td class="text-center">
                                    @if ($item->id_role === 1)
                                        <span class="badge badge-primary badge-pill">
                                            Admin
                                        </span>
                                    @else
                                        <span class="badge badge-success badge-pill">
                                            Pegawai
                                        </span>
                                    @endif

                                </td>
                                <td class="text-center">
                                    <span class="badge badge-success badge-pill">
                                        {{ $item->bidang->nama_bidang ?? '-' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if ($item->status_pegawai == 'ASN')
                                        <span class="badge badge-info badge-pill">
                                            ASN
                                        </span>
                                    @else
                                        <span class="badge badge-warning badge-pill">
                                            NON ASN
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('userEdit', $item->id_pegawai) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#ModalHapus{{ $item->id_pegawai }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @include('admin/user/modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection