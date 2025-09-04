@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-edit"></i>
    {{ $title }}
</h1>
<div class="card">
    <div class="card-header bg-primary">
        <a href="{{ route('kantorIndex') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('kantorUpdate', $kantor->id) }}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-xl-12 mb-1">
                    <label class="form-label">
                        <span class="text-danger">*</span> Nama Kantor :
                    </label>
                    <input type="text" name="kantor"
                        class="form-control @error('kantor') is-invalid @enderror"
                        value="{{ $kantor->kantor }}">
                    @error('kantor')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-xl-12 mb-1">
                    <label class="form-label">
                        <span class="text-danger">*</span> Alamat :
                    </label>
                    <textarea name="alamat" rows="3"
                        class="form-control @error('alamat') is-invalid @enderror">{{ $kantor->alamat }}</textarea>
                    @error('alamat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
