@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-box"></i>
        {{ $title }}
    </h1>
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between">
            <a href="{{ route('barangCreate') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data
            </a>
            <div>
                <a href="{{ route('barangExcel') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-file-excel mr-2"></i>
                    Excel
                </a>
                <a href="{{ route('barangPdf') }}" class="btn btn-danger btn-sm" target="_blank">
                    <i class="fas fa-file-pdf mr-2"></i>
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
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>Merk</th>
                            <th>Tipe</th>
                            <th>Status Ketersediaan</th>
                            <th>Harga</th>
                            <th><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->kode_barang }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->jenis->jenis_barang ?? '-' }}</td>
                                <td>{{ $item->merk->merk ?? '-' }}</td>
                                <td>{{ $item->tipe->tipe ?? '-' }}</td>
                                <td class="text-center">{{ $item->status_ketersediaan }}</td>
                                <td class="text-right">{{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td class="text-center">

                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#ModalView{{ $item->id_barang }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <a href="{{ route('barangEdit', $item->id_barang) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#ModalHapus{{ $item->id_barang }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    @include('admin.barang.barang.modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection