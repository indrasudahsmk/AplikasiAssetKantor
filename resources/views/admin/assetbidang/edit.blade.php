@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit"></i> {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-success">
            <a href="{{ route('assetBidangIndex') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('assetBidangUpdate', $assetbidang->id_aset) }}" method="post">
                @csrf

                <div class="mb-3">
                    <label class="form-label">
                        <span class="text-danger">*</span> Barang :
                    </label>
                    <select name="id_barang" 
                            class="form-control @error('id_barang') is-invalid @enderror">
                        <option disabled>-- PILIH BARANG --</option>
                        @foreach ($barang as $b)
                            <option value="{{ $b->id_barang }}" 
                                {{ old('id_barang', $assetbidang->id_barang) == $b->id_barang ? 'selected' : '' }}>
                                {{ $b->nama_barang }}
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
                        <option disabled>-- PILIH BIDANG --</option>
                        @foreach ($bidang as $bd)
                            <option value="{{ $bd->id_bidang }}" 
                                {{ old('id_bidang', $assetbidang->id_bidang) == $bd->id_bidang ? 'selected' : '' }}>
                                {{ $bd->nama_bidang }}
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
                        <option disabled>-- PILIH STATUS --</option>
                        <option value="aktif" {{ old('status', $assetbidang->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status', $assetbidang->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status')
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
