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
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">
                        <span class="text-danger">*</span> Barang :
                    </label>
                    <select class="form-control" disabled>
                            <option>
                                {{ $barang->nama_barang }} ({{ $barang->kode_barang }})
                            </option>
                    </select>
                    <input type="hidden" name="id_barang" value="{{ $assetbidang->id_barang }}">
                </div>


                <div class="mb-3">
                    <label class="form-label">
                        <span class="text-danger">*</span> Bidang :
                    </label>
                    <select name="id_bidang" class="form-control @error('id_bidang') is-invalid @enderror">
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
                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                        <option disabled>-- PILIH STATUS --</option>
                        <option value="Aktif" {{ old('status', $assetbidang->status) == 'Aktif' ? 'selected' : '' }}>Aktif
                        </option>
                        <option value="Mutasi" {{ old('status', $assetbidang->status) == 'Mutasi' ? 'selected' : '' }}>
                            Mutasi</option>
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
