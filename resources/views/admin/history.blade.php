@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-history"></i>
        {{ $title }}
    </h1>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Username</th>
                            <th>Bidang</th>
                            <th>Kode Barang</th>
                            <th>Barang</th>
                            <th>Jenis Aset</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $item)
                            <tr>
                                <td align="center">{{ $loop->iteration }}</td>
                                <td align="center">{{ $item->tanggal }}</td>
                                <td align="center">{{ $item->pegawai->username ?? '-' }}</td>
                                <td align="center">{{ $item->bidang->nama_bidang ?? '-' }}</td>
                                <td align="center">{{ $item->barang->kode_barang ?? '-' }}</td>
                                <td align="center">{{ $item->barang->nama_barang ?? '-' }}</td>
                                <td align="center">{{ ucfirst(str_replace('_', ' ', $item->jenis_aset)) }}</td>
                                <td align="center">{{ $item->barang->kondisi_barang }}</td>
                                <td align="center"><span
                                        class="badge badge-pill 
                                            {{ $item->keterangan_aksi == 'store'
                                            ? 'badge-success'
                                            : ($item->keterangan_aksi == 'update'
                                            ? 'badge-primary'
                                            : ($item->keterangan_aksi == 'delete'
                                            ? 'badge-danger'
                                            : 'badge-secondary')) }}">
                                        {{ $item->keterangan_aksi }}
                                    </span>
                                </td>
                                <td align="center">{{ $item->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
