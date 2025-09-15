@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus"></i> {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-success">
            <a href="{{ route('assetBidangIndex') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('assetBidangStore') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label class="form-label">
                        <span class="text-danger">*</span> Barang :
                    </label>
                    <select name="id_barang" 
                            class="form-control @error('id_barang') is-invalid @enderror">
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

                <div class="mb-3">
                    <label class="form-label">
                        <span class="text-danger">*</span> Bidang :
                    </label>
                    <select name="id_bidang" 
                            class="form-control @error('id_bidang') is-invalid @enderror">
                        <option disabled {{ old('id_bidang') ? '' : 'selected' }}>-- PILIH BIDANG --</option>
                        @foreach ($bidang as $bidang)
                            <option value="{{ $bidang->id_bidang }}" 
                                {{ old('id_bidang') == $bidang->id_bidang ? 'selected' : '' }}>
                                {{ $bidang->nama_bidang }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_bidang')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        <span class="text-danger">*</span> Status :
                    </label>
                    <select name="status" 
                            class="form-control @error('status') is-invalid @enderror">
                        <option disabled {{ old('status') ? '' : 'selected' }}>-- PILIH STATUS --</option>
                        <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Mutasi" {{ old('status') == 'Mutasi' ? 'selected' : '' }}>Mutasi</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
