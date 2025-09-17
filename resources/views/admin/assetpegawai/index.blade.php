@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user"></i>
        {{ $title }}
    </h1>
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
            <a href="{{ route('assetPegawaiCreate') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data
            </a>
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
                            <th>Nama Pegawai</th>
                            <th>Barang</th>
                            <th>Status</th>
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assetp as $item)
                            <tr>
                                <td align="center">{{ $loop->iteration }}</td>
                                <td align="center">{{ $item->pegawai->nama }}</td>
                                <td align="center">{{ $item->barang->nama_barang }}</td>
                                <td align="center">{{ $item->status }}</td>
                                <td class="text-center">
                                    @if ($item->status == 'Digunakan')
                                        <button class="btn btn-sm btn-success" data-toggle="modal" title="Kembalikan Barang"
                                            data-target="#ModalHapus{{ $item->id_aset }}">
                                            <i class="fas fa-undo-alt"></i>
                                        </button>
                                    @endif

                                    @include('admin/assetpegawai/modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
