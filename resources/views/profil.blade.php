@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-user"></i> Profil Saya
</h1>

<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('profil.update', Auth::user()->id_pegawai) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">NIP / NIK</label>
                    <input type="text" name="nip_nik" class="form-control @error('nip_nik') is-invalid @enderror"
                        value="{{ old('nip_nik', Auth::user()->nip_nik) }}" readonly>
                    @error('nip_nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                        value="{{ old('username', Auth::user()->username) }}">
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama', Auth::user()->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', Auth::user()->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Password Baru</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti password</small>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" class="form-control" 
                        value="{{ Auth::user()->jabatan ? Auth::user()->jabatan->jabatan : '-' }}" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Bidang</label>
                    <input type="text" class="form-control" 
                        value="{{ Auth::user()->bidang ? Auth::user()->bidang->nama_bidang : '-' }}" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Status Pegawai</label>
                    <input type="text" class="form-control" 
                        value="{{ Auth::user()->status_pegawai }}" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Role</label>
                    <input type="text" class="form-control"
                        value="{{ Auth::user()->id_role === 1 ? 'Admin' : 'Pegawai' }}" readonly>
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-between">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
