@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit"></i>
        {{ $title }}
    </h1>
    <div class="card">
        <div class="card-header bg-primary">
            <a href="{{ route('jabatan') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('jabatanUpdate', $jabatan->id_jabatan) }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-xl-12 mb-1">
                        <label for="" class="form-label">
                            <span class="text-danger">*</span>
                            Jabatan :
                        </label>
                        <input type="text" name="jabatan"
                            class="form-control @error('jabatan') is-invalid @enderror"
                            value="{{ $jabatan->jabatan }}">
                        @error('jabatan')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection