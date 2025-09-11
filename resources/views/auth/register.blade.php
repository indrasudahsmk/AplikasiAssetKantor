<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>M-Tugas | Register</title>

    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    Registrasi Pegawai
                                </h1>
                            </div>

                            <form class="user" method="post" action="{{ route('registerProses') }}">
                                @csrf

                                <!-- Input NIP/NIK -->
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-user @error('nip_nik') is-invalid @enderror"
                                        placeholder="Masukkan NIP/NIK" name="nip_nik" value="{{ old('nip_nik') }}"
                                        autocomplete="off">
                                    @error('nip_nik')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Input Username -->
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-user @error('username') is-invalid @enderror"
                                        placeholder="Masukkan Username" name="username" value="{{ old('username') }}"
                                        autocomplete="off">
                                    @error('username')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Input Email -->
                                <div class="form-group">
                                    <input type="email"
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        placeholder="Masukkan Email" name="email" value="{{ old('email') }}"
                                        autocomplete="off">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Input Nama Lengkap -->
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-user @error('nama') is-invalid @enderror"
                                        placeholder="Masukkan Nama Lengkap" name="nama" value="{{ old('nama') }}"
                                        autocomplete="off">
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Status Pegawai -->
                                <div class="form-group @error('status_pegawai') is-invalid @enderror">
                                    <label class="form-label">
                                     Status Pegawai :
                                    </label>
                                    <br>
                                    <input type="radio" class="btn-check" name="status_pegawai" id="ASN"
                                        value="ASN" {{ old('status_pegawai') == 'ASN' ? 'checked' : '' }}>
                                    <label for="ASN" class="mr-3">ASN</label>

                                    <input type="radio" class="btn-check" name="status_pegawai" id="NON_ASN"
                                        value="NON ASN" {{ old('status_pegawai') == 'NON ASN' ? 'checked' : '' }}>
                                    <label for="NON_ASN" class="mr-3">NON ASN</label>

                                    @error('status_pegawai')
                                        <br><small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Select Jabatan -->
                                <div class="form-group">
                                    <select name="id_jabatan"
                                        class="form-control @error('id_jabatan') is-invalid @enderror">
                                        <option value="" disabled selected>-- PILIH JABATAN --</option>
                                        @foreach ($jabatans as $jabatan)
                                            <option value="{{ $jabatan->id_jabatan }}"
                                                {{ old('id_jabatan') == $jabatan->id_jabatan ? 'selected' : '' }}>
                                                {{ $jabatan->jabatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_jabatan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Select Bidang -->
                                <div class="form-group">
                                    <select name="id_bidang"
                                        class="form-control @error('id_bidang') is-invalid @enderror">
                                        <option value="" disabled selected>-- PILIH BIDANG --</option>
                                        @foreach ($bidangs as $bidang)
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

                                <!-- Input Password -->
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                        placeholder="Masukkan Password" name="password">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Konfirmasi Password -->
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        placeholder="Konfirmasi Password" name="password_confirmation">
                                </div>

                                <!-- Tombol Register -->
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    REGISTER
                                </button>

                                <hr>
                                <div class="text-center small">
                                    Sudah punya akun? <a href="{{ route('login') }}">Login disini</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
