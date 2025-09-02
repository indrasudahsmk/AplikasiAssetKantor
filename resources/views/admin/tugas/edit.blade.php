@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus"></i>
        {{ $title }}
    </h1>
    <div class="card">
        <div class="card-header bg-primary">
            <a href="{{ route('tugas') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('tugasUpdate',$tugas->id) }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="" class="form-label">
                            <span class="text-danger">
                                *
                            </span>
                            Nama :
                        </label>
                        <input type="text" value="{{ $tugas->user->nama }}" class="form-control" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12 mb-1">
                        <label for="" class="form-label">
                            <span class="text-danger">
                                *
                            </span>
                            Tugas :
                        </label>
                        <div>
                            <textarea name="tugas" rows="5"
                                class="form-control @error('tugas')
                            is-invalid
                        @enderror">{{ $tugas->tugas }}</textarea>
                            @error('tugas')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-6 mb-1">
                        <label for="" class="form-label">
                            <span class="text-danger">
                                *
                            </span>
                            Tanggal Mulai :
                        </label>
                        <div>
                            <input type="date" name="tanggal_mulai" id=""
                                class="form-control @error('tanggal_mulai')
                            is-invalid
                        @enderror" value="{{ $tugas->tanggal_mulai }}">
                            @error('tanggal_mulai')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6 mb-1">
                        <label for="" class="form-label">
                            <span class="text-danger">
                                *
                            </span>
                            Tanggal Selesai :
                        </label>
                        <div>
                            <input type="date" name="tanggal_selesai" id=""
                                class="form-control @error('tanggal_selesai')
                            is-invalid
                        @enderror" value="{{ $tugas->tanggal_selesai }}">
                            @error('tanggal_selesai')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fas fa-save mr-2"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
