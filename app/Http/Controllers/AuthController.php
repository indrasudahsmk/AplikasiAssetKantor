<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Bidang;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProses(Request $request)
    {
        $request->validate([
            'username'  => 'required',
            'password' => 'required|min:8',
        ], [
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($data)){
            return redirect()->route('dashboard')->with('success','Anda Berhasil Login');
        }else{
            return redirect()->back()->with('error','Username atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success','Anda Berhasil Logout');
    }

    public function register()
    {
        $jabatans = Jabatan::all(); 
        $bidangs = Bidang::all();   

        return view('auth.register', compact('jabatans','bidangs'));
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'nip_nik'    => 'required|unique:pegawai,nip_nik',
            'username'   => 'required|unique:pegawai,username',
            'email'      => 'required|email|unique:pegawai,email',
            'nama'       => 'required',
            'id_jabatan' => 'required|exists:jabatan,id_jabatan',
            'id_bidang'  => 'required|exists:bidang,id_bidang',
            'password'   => 'required|min:8|confirmed', 
        ], [
            'nip_nik.required'    => 'NIP/NIK tidak boleh kosong',
            'nip_nik.unique'      => 'NIP/NIK sudah terdaftar',
            'username.required'   => 'Username tidak boleh kosong',
            'username.unique'     => 'Username sudah digunakan',
            'email.required'      => 'Email tidak boleh kosong',
            'email.email'         => 'Format email tidak valid',
            'email.unique'        => 'Email sudah digunakan',
            'nama.required'       => 'Nama lengkap tidak boleh kosong',
            'id_jabatan.required' => 'Pilih jabatan',
            'id_bidang.required'  => 'Pilih bidang',
            'password.required'   => 'Password tidak boleh kosong',
            'password.min'        => 'Password minimal 8 karakter',
            'password.confirmed'  => 'Konfirmasi password tidak cocok',
        ]);

        Pegawai::create([
            'nip_nik'    => $request->nip_nik,
            'username'   => $request->username,
            'email'      => $request->email,
            'nama'       => $request->nama,
            'id_jabatan' => $request->id_jabatan,
            'id_bidang'  => $request->id_bidang,
            'password'   => Hash::make($request->password),
            'status_pegawai' => 'aktif', // default status
        ]);

        return redirect()->route('login')->with('success','Registrasi berhasil, silahkan login');
    }
}
