@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit"></i>
        {{ $title }}
    </h1>
    <div class="card">
        <div class="card-header bg-primary">
            <a href="{{ route('assetsaya') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('assetsayaUpdate',$assetp->id_aset) }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-xl-12 mb-1">
                        <label class="form-label"><span class="text-danger">*</span> Barang :</label>
                    <select class="form-control @error('id_barang') is-invalid @enderror" name="id_barang">
                        <option disabled {{ old('id_barang', $assetp->id_barang) ? '' : 'selected' }}>-- PILIH JENIS --</option>
                        @foreach ($barang as $item)
                            <option value="{{ $item->id_barang }}" {{ old('id_barang', $assetp->id_barang) == $item->id_aset ? 'selected' : '' }}>
                                 {{ $item->nama_barang }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_jenis')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12 mb-1">
                        <label class="form-label"><span class="text-danger">*</span> Status :</label>
                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                        <option disabled {{ old('status', $assetp->status) ? '' : 'selected' }}>-- PILIH JENIS --</option>
                            <option value="Dipinjam" {{ $assetp->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                           <option value="Dikembalikan" {{ $assetp->status == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
