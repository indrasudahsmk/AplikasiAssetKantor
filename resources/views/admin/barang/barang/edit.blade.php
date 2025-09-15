@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit"></i> {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-success">
            <a href="{{ route('barang') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('barangUpdate', $barang->id_barang) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label"><span class="text-danger">*</span> Kode Barang :</label>
                    <input type="text" name="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror"
                           value="{{ old('kode_barang', $barang->kode_barang) }}" autocomplete="off">
                    @error('kode_barang')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><span class="text-danger">*</span> Nama Barang :</label>
                    <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror"
                           value="{{ old('nama_barang', $barang->nama_barang) }}" autocomplete="off">
                    @error('nama_barang')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><span class="text-danger">*</span> Jenis :</label>
                    <select class="form-control @error('id_jenis') is-invalid @enderror" name="id_jenis">
                        <option disabled {{ old('id_jenis', $barang->id_jenis) ? '' : 'selected' }}>-- PILIH JENIS --</option>
                        @foreach ($jenis as $item)
                            <option value="{{ $item->id }}" {{ old('id_jenis', $barang->id_jenis) == $item->id ? 'selected' : '' }}>
                                {{ $item->jenis_barang }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_jenis')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><span class="text-danger">*</span> Merk :</label>
                    <select class="form-control @error('id_merk') is-invalid @enderror" name="id_merk">
                        <option disabled {{ old('id_merk', $barang->id_merk) ? '' : 'selected' }}>-- PILIH MERK --</option>
                        @foreach ($merk as $item)
                            <option value="{{ $item->id }}" {{ old('id_merk', $barang->id_merk) == $item->id ? 'selected' : '' }}>
                                {{ $item->merk }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_merk')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><span class="text-danger">*</span> Tipe :</label>
                    <select class="form-control @error('id_tipe') is-invalid @enderror" name="id_tipe">
                        <option disabled {{ old('id_tipe', $barang->id_tipe) ? '' : 'selected' }}>-- PILIH TIPE --</option>
                        @foreach ($tipe as $item)
                            <option value="{{ $item->id }}" {{ old('id_tipe', $barang->id_tipe) == $item->id ? 'selected' : '' }}>
                                {{ $item->tipe }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_tipe')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Register :</label>
                    <input type="text" name="nomor_register" class="form-control" value="{{ old('nomor_register', $barang->nomor_register) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tahun Pembelian :</label>
                    <input type="number" name="tahun_pembelian" class="form-control" value="{{ old('tahun_pembelian', $barang->tahun_pembelian) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga :</label>
                    <input type="number" name="harga" class="form-control" value="{{ old('harga', $barang->harga) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">No. Pabrik :</label>
                    <input type="text" name="no_pabrik" class="form-control" value="{{ old('no_pabrik', $barang->no_pabrik) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">No. Rangka :</label>
                    <input type="text" name="no_rangka" class="form-control" value="{{ old('no_rangka', $barang->no_rangka) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">No. Mesin :</label>
                    <input type="text" name="no_mesin" class="form-control" value="{{ old('no_mesin', $barang->no_mesin) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan :</label>
                    <textarea name="keterangan" class="form-control">{{ old('keterangan', $barang->keterangan) }}</textarea>
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
