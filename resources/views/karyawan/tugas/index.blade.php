@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-tasks"></i>
        {{ $title }}
    </h1>
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">

            @if (auth()->user()->is_tugas == true)
                <div class="mb-1 mr-2">

                </div>
                <div>
                    <a href="{{ route('tugasKaryawanPdf') }}" class="btn btn-danger btn-sm">
                        <i class="fas fa-file-pdf mr-2" target='__blank'></i>
                        PDF
                    </a>
                </div>
            @endif

        </div>
        <div class="card-body">
            @if (auth()->user()->is_tugas == true)
                <div class="row">
                    <div class="col-6">Nama</div>
                    <div class="col-6">: {{ $tugas->user->nama }}</div>
                </div>
                <div class="row">
                    <div class="col-6">Email</div>
                    <div class="col-6">
                        <span class="badge badge-primary">: {{ $tugas->user->email }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">Tugas</div>
                    <div class="col-6">: {{ $tugas->tugas }}</div>
                </div>
                <div class="row">
                    <div class="col-6">Tanggal Mulai</div>
                    <div class="col-6">
                        <span class="badge badge-info">: {{ $tugas->tanggal_mulai }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">Tanggal Selesai</div>
                    <div class="col-6">
                        <span class="badge badge-info">: {{ $tugas->tanggal_selesai }}</span>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-6">Status</div>
                    <div class="col-6">
                        :
                        <span class="badge badge-danger">
                            Belum Di Tugaskan
                        </span>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
