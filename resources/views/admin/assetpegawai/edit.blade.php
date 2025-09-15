@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit"></i>
        {{ $title }}
    </h1>
    <div class="card">
        <div class="card-header bg-primary">
            <a href="{{ route('assetPegawaiIndex') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('assetPegawaiUpdate',$assetp->id_aset) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-xl-12 mb-1">
                        <label class="form-label"><span class="text-danger">*</span> Pegawai :</label>
                    <select class="form-control @error('id_pegawai') is-invalid @enderror" name="id_pegawai">
                        <option disabled {{ old('id_pegawai', $assetp->id_pegawai) ? '' : 'selected' }}>-- PILIH PEGAWAI --</option>
                        @foreach ($pegawai as $item)
                            <option value="{{ $item->id_pegawai }}" {{ old('id_pegawai', $assetp->id_pegawai) == $item->id_pegawai ? 'selected' : '' }}>
                                {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_pegawai')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12 mb-1">
                        <label class="form-label"><span class="text-danger">*</span> Barang :</label>
                    <select class="form-control @error('id_barang') is-invalid @enderror" name="id_barang">
                        <option disabled {{ old('id_barang', $assetp->id_barang) ? '' : 'selected' }}>-- PILIH BARANG --</option>
                        @foreach ($barang as $item)
                            <option value="{{ $item->id_barang }}" {{ old('id_barang', $assetp->id_barang) == $item->id_barang ? 'selected' : '' }}>
                                {{ $item->nama_barang }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_barang')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-xl-12 mb-1">
                        <label class="form-label"><span class="text-danger">*</span> Status :</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                        <option selected disabled>-- PILIH STATUS --</option>
                        <option value="Dipinjam" {{ $assetp->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="Dikembalikan" {{ $assetp->status == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                    </select>
                    @error('status')
                        <small class="text-danger">
                            {{ $message }}
                        </small>    
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
