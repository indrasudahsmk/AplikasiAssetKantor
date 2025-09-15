@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-building"></i>
        {{ $title }}
    </h1>
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between">
            <a href="{{ route('kantorCreate') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data
            </a>
            <div>
                <a href="{{ route('kantorExcel') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-file-excel mr-2"></i>
                    Excel
                </a>
                <a href="{{ route('kantorPdf') }}" class="btn btn-danger btn-sm" target="_blank">
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
                            <th>Kantor</th>
                            <th>Alamat</th>
                            <th><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kantor as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->kantor }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td class="text-center">
                                    <a href="{{ route('kantorEdit', $item->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <!-- Tombol buka modal -->
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#ModalHapus{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <!-- Panggil modal hapus -->
                                    @include('admin.kantor.modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
