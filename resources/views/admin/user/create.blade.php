@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus"></i>
        {{ $title }}
    </h1>
    <div class="card">
        <div class="card-header bg-success">
            <a href="{{ route('pegawai.index') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('userStore') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-xl-6 mb-1">
                        <label for="" class="form-label">
                            <span class="text-danger">
                                *
                            </span>
                            Nama :
                        </label>
                        <input type="text" name="nama"
                            class="form-control
                        @error('nama')
                            is-invalid
                        @enderror" value="{{ old('nama') }}" autocomplete="off">
                        @error('nama')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label for="" class="form-label">
                            <span class="text-danger">
                                *
                            </span>
                            Username :
                        </label>
                        <input type="text" name="username"
                            class="form-control
                        @error('username')
                            is-invalid
                        @enderror" value="{{ old('username') }}" autocomplete="off">
                        @error('username')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                <div class="col-xl-6 mb-1">
                        <label for="" class="form-label">
                            <span class="text-danger">
                                *
                            </span>
                            NIP/NIK :
                        </label>
                        <input type="text" name="nip_nik"
                            class="form-control
                        @error('nip_nik')
                            is-invalid
                        @enderror" value="{{ old('nip_nik') }}" autocomplete="off">
                        @error('nip')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror    
                </div>   
                <div class="col-xl-6 mb-1">
                        <label for="" class="form-label">
                            <span class="text-danger">
                                *
                            </span>
                            Status Pegawai :
                        </label>
                        <br>
                        <input type="radio" class="btn-check" name="status_pegawai" id="ASN" value="ASN"
                            {{ old('status_pegawai') == 'ASN' ? 'checked' : '' }}>
                        <label for="ASN" class="mr-3">ASN</label> 
                        <input type="radio" class="btn-check" name="status_pegawai" id="Non ASN" value="Non ASN"
                            {{ old('status_pegawai') == 'Non ASN' ? 'checked' : '' }}>
                        <label for="Non ASN" class="mr-3">Non ASN</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-6 mb-1">
                        <label for="" class="form-label">
                            <span class="text-danger">
                                *
                            </span>
                            Jabatan :
                        </label>
                        <select
                            class="form-control @error('jabatan')
                            is-invalid
                        @enderror"
                            name="jabatan" id="">
                            <option selected disabled>--PILIH JABATAN--</option>
                            <option value="Admin">Admin</option>
                            <option value="Pegawai">Pegawai</option>
                        </select>
                        @error('jabatan')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                        <span class="text-danger">*</span> Bidang :
                    </label>
                    <select name="user_id" class="form-control w-100 @error('id_bidang') is-invalid @enderror" 
                     style="min-width: 100%;">
                        <option selected disabled>-- PILIH BIDANG --</option>
                        @foreach ($user as $item)
                            <option value="{{ $item->id_bidang }}">
                                {{ $item->nama_bidang }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_bidang')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-6 mb-1">
                        <label for="" class="form-label">
                            <span class="text-danger">
                                *
                            </span>
                            Password :
                        </label>
                        <input type="password" name="password"
                            class="form-control @error('password')
                            is-invalid
                        @enderror">
                        @error('password')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-1">
                        <label for="" class="form-label">
                            <span class="text-danger">
                                *
                            </span>
                            Konfirmasi Password :
                        </label>
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password')
                            is-invalid
                        @enderror">
                    </div>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fas fa-save mr-2"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
