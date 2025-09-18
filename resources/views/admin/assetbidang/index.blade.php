@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-boxes"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between">
            <a href="{{ route('assetBidangCreate') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data
            </a>
            <div>
                <a href="{{ route('assetBidangExcel') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-file-excel mr-2"></i>
                    Excel
                </a>
                <a href="{{ route('assetBidangPdf') }}" class="btn btn-danger btn-sm" target="_blank">
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
                            <th>Barang</th>
                            <th>Kondisi Brg</th>
                            <th>No Mesin</th>
                            <th>No Registrasi</th>
                            <th>Bidang</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assetbidang as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->barang->kode_barang ?? '-' }}</td>
                                <td>{{ $item->barang->nama_barang ?? '-' }} </td>
                                <td>{{ $item->barang->kondisi_barang ?? '-' }} </td>
                                <td>{{ $item->barang->no_mesin ?? '-' }} </td>
                                <td>{{ $item->barang->nomor_register ?? '-' }} </td>
                                <td>{{ $item->bidang->nama_bidang ?? '-' }}</td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $item->status == 'Aktif' ? 'success' : 'secondary' }}">
                                        {{ $item->status ?? '-' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('assetBidangEdit', $item->id_aset) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    @if ($item->status == 'Aktif')
                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#ModalHapus{{ $item->id_aset }}">
                                            <i class="fas fa-undo-alt"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-primary">
                                            <a href="{{ route('mutasiIndex') }}">
                                                <i class="fas fa-exchange-alt text-white"></i>
                                            </a>
                                        </button>
                                    @endif

                                    @include('admin.assetbidang.modal', ['item' => $item])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
