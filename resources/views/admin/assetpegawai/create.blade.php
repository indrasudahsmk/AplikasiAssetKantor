@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus"></i>
        {{ $title }}
    </h1>
    <div class="card">
        <div class="card-header bg-success">
            <a href="{{ route('assetPegawaiIndex') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('assetPegawaiStore') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-xl-12 mb-1">
                        <label class="form-label"><span class="text-danger">*</span> Pegawai :</label>
                    <select class="form-control @error('id_pegawai') is-invalid @enderror" name="id_pegawai">
                        <option disabled {{ old('id_pegawai') ? '' : 'selected' }}>-- PILIH PEGAWAI --</option>
                        @foreach ($pegawai as $item)
                        <option value="{{ $item->id_pegawai }}">
                         {{ $item->nama }}
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
                        <label class="form-label"><span class="text-danger">*</span> Barang :</label>
                    <select class="form-control @error('id_barang') is-invalid @enderror" name="id_barang">
                        <option disabled {{ old('id_barang') ? '' : 'selected' }}>-- PILIH BARANG --</option>
                        @foreach ($barang as $barang)
                            <option value="{{ $barang->id_barang }}" 
                                {{ old('id_barang') == $barang->id_barang ? 'selected' : '' }}>
                                {{ $barang->nama_barang }} ({{ $barang->kode_barang }})
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
                        <label class="form-label">Status :</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                        <option selected disabled>-- PILIH STATUS --</option>
                        <option value="Dipinjam">Dipinjam</option>
                        <option value="Dikembalikan">Dikembalikan</option>
                    </select>
                    @error('status')
                        <small class="text-danger">
                            {{ $message }}
                        </small>    
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
