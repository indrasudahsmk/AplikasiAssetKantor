@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-edit"></i> {{ $title }}
</h1>
<div class="card">
    <div class="card-header bg-success">
        <a href="{{ route('pegawaiIndex') }}" class="btn btn-success btn-sm">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('userUpdate', $user->id_pegawai) }}" method="post">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-xl-6 mb-1">
                    <label class="form-label"><span class="text-danger">*</span> Nama :</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama', $user->nama) }}" autocomplete="off">
                    @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-xl-6">
                    <label class="form-label"><span class="text-danger">*</span> Username :</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                        value="{{ old('username', $user->username) }}" autocomplete="off">
                    @error('username') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-xl-6 mb-1">
                    <label class="form-label"><span class="text-danger">*</span> NIP/NIK :</label>
                    <input type="number" name="nip_nik" class="form-control @error('nip_nik') is-invalid @enderror"
                        value="{{ old('nip_nik', $user->nip_nik) }}" autocomplete="off">
                    @error('nip_nik') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-xl-6 mb-1">
                    <label class="form-label"><span class="text-danger">*</span> Status Pegawai :</label><br>
                    <input type="radio" class="btn-check" name="status_pegawai" id="ASN" value="ASN"
                        {{ old('status_pegawai', $user->status_pegawai) == 'ASN' ? 'checked' : '' }}>
                    <label for="ASN" class="mr-3">ASN</label>

                    <input type="radio" class="btn-check" name="status_pegawai" id="NON_ASN" value="NON ASN"
                        {{ old('status_pegawai', $user->status_pegawai) == 'NON ASN' ? 'checked' : '' }}>
                    <label for="NON_ASN" class="mr-3">NON ASN</label>

                    @error('status_pegawai') <br><small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-xl-6 mb-1">
                    <label class="form-label"><span class="text-danger">*</span> Jabatan :</label>
                    <select class="form-control @error('id_jabatan') is-invalid @enderror" name="id_jabatan">
                        <option disabled {{ old('id_jabatan', $user->id_jabatan) ? '' : 'selected' }}>-- PILIH JABATAN --</option>
                        @foreach ($jabatan as $item)
                            <option value="{{ $item->id_jabatan }}"
                                {{ old('id_jabatan', $user->id_jabatan) == $item->id_jabatan ? 'selected' : '' }}>
                                {{ $item->jabatan }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_jabatan') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-xl-6 mb-1">
                    <label class="form-label"><span class="text-danger">*</span> Bidang :</label>
                    <select name="id_bidang" class="form-control w-100 @error('id_bidang') is-invalid @enderror">
                        <option disabled {{ old('id_bidang', $user->id_bidang) ? '' : 'selected' }}>-- PILIH BIDANG --</option>
                        @foreach ($bidang as $item)
                            <option value="{{ $item->id_bidang }}"
                                {{ old('id_bidang', $user->id_bidang) == $item->id_bidang ? 'selected' : '' }}>
                                {{ $item->nama_bidang }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_bidang') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-xl-6 mb-1">
                    <label class="form-label">Password :</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti password</small>
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-xl-6 mb-1">
                    <label class="form-label">Konfirmasi Password :</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror">
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fas fa-save mr-2"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
