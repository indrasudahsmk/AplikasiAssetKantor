@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus"></i>
        {{ $title }}
    </h1>
    <div class="card">
        <div class="card-header bg-success">
            <a href="{{ route('jenis') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('jenisStore') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-xl-12 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span> Jenis Barang :
                        </label>
                        <input type="text" name="jenis_barang" class="form-control @error('jenis_barang') is-invalid @enderror"
                            value="{{ old('jenis_barang') }}" autocomplete="off">
                        @error('jenis_barang')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    </div>
                

                <div>
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fas fa-save mr-2"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
