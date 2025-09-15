@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit"></i> {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-primary">
            <a href="{{ route('assetPegawaiIndex') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('assetPegawaiUpdate', $assetp->id_aset) }}" method="post">
                @csrf
                @method('PUT')

                {{-- Barang (dibuat readonly seperti AssetBidang) --}}
                <div class="mb-3">
                    <label class="form-label">
                        <span class="text-danger">*</span> Barang :
                    </label>
                    <select class="form-control" disabled>
                        <option>
                            {{ $barang->nama_barang }} ({{ $barang->kode_barang }})
                        </option>
                    </select>
                    <input type="hidden" name="id_barang" value="{{ $assetp->id_barang }}">
                </div>

                {{-- Pegawai --}}
                <div class="mb-3">
                    <label class="form-label">
                        <span class="text-danger">*</span> Pegawai :
                    </label>
                    <select name="id_pegawai" class="form-control @error('id_pegawai') is-invalid @enderror">
                        <option disabled>-- PILIH PEGAWAI --</option>
                        @foreach ($pegawai as $pgw)
                            <option value="{{ $pgw->id_pegawai }}"
                                {{ old('id_pegawai', $assetp->id_pegawai) == $pgw->id_pegawai ? 'selected' : '' }}>
                                {{ $pgw->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_pegawai')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label">
                        <span class="text-danger">*</span> Status :
                    </label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="" disabled selected>-- PILIH STATUS --</option>
                        <option value="Dipinjam" {{ old('status', $assetp->status) == 'Dipinjam' ? 'selected' : '' }}>
                            Dipinjam</option>
                        <option value="Dikembalikan"
                            {{ old('status', $assetp->status) == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
