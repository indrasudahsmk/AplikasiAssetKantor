@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus"></i>
        Tambah Mutasi Aset
    </h1>

    <div class="card">
        <div class="card-header bg-primary">
            <a href="{{ route('mutasiIndex') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('mutasiStore') }}" method="post">
                @csrf

                <div class="row mb-3">
                    <div class="col-xl-12 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span> Barang :
                        </label>
                        <select name="id_barang" class="form-control @error('id_barang') is-invalid @enderror">
                            <option value="">-- Pilih Barang --</option>
                            @foreach ($assetbidang as $assetbidang)
                                <option value="{{ $assetbidang->barang->id_barang }}" {{ old('id_barang') == $assetbidang->barang->id_barang ? 'selected' : '' }}>
                                    {{ $assetbidang->barang->nama_barang }} ({{  $assetbidang->barang->kode_barang}})
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
                        <label class="form-label">
                            <span class="text-danger">*</span> Dari Bidang :
                        </label>
                        <select name="dari_bidang" class="form-control @error('dari_bidang') is-invalid @enderror">
                            <option value="">-- Pilih Bidang Asal --</option>
                            @foreach ($bidang as $bd)
                                <option value="{{ $bd->id_bidang }}" {{ old('dari_bidang') == $bd->id_bidang ? 'selected' : '' }}>
                                    {{ $bd->nama_bidang }}
                                </option>
                            @endforeach
                        </select>
                        @error('dari_bidang')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-12 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span> Ke Bidang :
                        </label>
                        <select name="ke_bidang" class="form-control @error('ke_bidang') is-invalid @enderror">
                            <option value="">-- Pilih Bidang Tujuan --</option>
                            @foreach ($bidang as $bd)
                                <option value="{{ $bd->id_bidang }}" {{ old('ke_bidang') == $bd->id_bidang ? 'selected' : '' }}>
                                    {{ $bd->nama_bidang }}
                                </option>
                            @endforeach
                        </select>
                        @error('ke_bidang')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-3 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span> Tanggal Mutasi :
                        </label>
                        <input type="date" name="tanggal_mutasi"
                               class="form-control @error('tanggal_mutasi') is-invalid @enderror"
                               value="{{ old('tanggal_mutasi') }}">
                        @error('tanggal_mutasi')
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
