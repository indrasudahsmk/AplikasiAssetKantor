@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-exchange-alt"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <a href="{{ route('mutasiCreate') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Dari Bidang</th>
                            <th>Ke Bidang</th>
                            <th>Tanggal Mutasi</th>
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mutasi as $item)
                            <tr>
                                <td align="center">{{ $loop->iteration }}</td>
                                <td align="center">{{ $item->barang->nama_barang ?? '-' }}</td>
                                <td align="center">{{ $item->dariBidang->nama_bidang ?? '-' }}</td>
                                <td align="center">{{ $item->keBidang->nama_bidang ?? '-' }}</td>
                                <td align="center">{{ $item->tanggal_mutasi ? \Carbon\Carbon::parse($item->tanggal_mutasi)->format('d-m-Y') : '-' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('mutasiEdit', ['id_mutasi' => $item->id_mutasi]) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#ModalHapus{{ $item->id_mutasi }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @include('admin.mutasi_asset.modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
