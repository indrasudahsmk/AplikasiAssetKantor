@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit"></i> {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-success">
            <a href="{{ route('bidangIndex') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('bidangUpdate', $bidang->id_bidang) }}" method="post">
                @csrf

                <div class="mb-3">
                    <label class="form-label">
                        <span class="text-danger">*</span> Nama Bidang :
                    </label>
                    <input type="text" 
                           name="nama_bidang" 
                           class="form-control @error('nama_bidang') is-invalid @enderror"
                           value="{{ old('nama_bidang', $bidang->nama_bidang) }}" 
                           autocomplete="off">
                    @error('nama_bidang')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        <span class="text-danger">*</span> Kantor :
                    </label>
                    <select class="form-control @error('kantor') is-invalid @enderror" name="kantor">
                        <option disabled>-- PILIH KANTOR --</option>
                        @foreach ($kantor as $item)
                            <option value="{{ $item->id }}"
                                {{ old('kantor', $bidang->kantor) == $item->id ? 'selected' : '' }}>
                                {{ $item->kantor }}
                            </option>
                        @endforeach
                    </select>
                    @error('kantor')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
