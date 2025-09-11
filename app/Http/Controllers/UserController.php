<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bidang;
use App\Models\Jabatan;
use App\Models\Pegawai;

use App\Exports\UserExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use function Laravel\Prompts\password;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Pegawai',
            'menuAdminUser' => 'active',
            'pegawai'          => Pegawai::orderBy('id_jabatan', 'desc')->get(),
        ];
        return view('admin/user/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data User',
            'menuAdminUser' => 'active',
            'user'  => Pegawai::all(),
            'jabatan' => Jabatan::all(),
            'bidang' => Bidang::all(),
        ];

        return view('admin/user/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'           => 'required',
            'username'       => ['required', Rule::unique('pegawai')->whereNull('deleted_at')],
            'email'          => ['required', 'email', Rule::unique('pegawai')->whereNull('deleted_at')],
            'nip_nik'        => ['required', Rule::unique('pegawai')->whereNull('deleted_at')],
            'status_pegawai' => 'required',
            'id_role'        => 'required',
            'id_jabatan'     => 'required',
            'id_bidang'      => 'required',
            'password'       => 'required|confirmed|min:8',
        ], [
            'nama.required'           => 'Nama Wajib Diisi',
            'username.required'       => 'Username Wajib Diisi',
            'username.unique'         => 'Username Sudah Terdaftar',
            'email.required'          => 'Email Wajib Diisi',
            'email.email'             => 'Format Email Tidak Valid',
            'email.unique'            => 'Email Sudah Terdaftar',
            'nip_nik.required'        => 'NIP/NIK Wajib Diisi',
            'nip_nik.unique'          => 'NIP/NIK Sudah Terdaftar',
            'status_pegawai.required' => 'Status Pegawai Wajib Dipilih',
            'id_role.required'        => 'Role Wajib Dipilih',
            'id_jabatan.required'     => 'Jabatan Wajib Dipilih',
            'id_bidang.required'      => 'Bidang Wajib Dipilih',
            'password.required'       => 'Password Wajib Diisi',
            'password.confirmed'      => 'Konfirmasi Password Tidak Sama',
            'password.min'            => 'Password Minimal 8 Karakter',
        ]);

        $user = new Pegawai();
        $user->nama           = $request->nama;
        $user->username       = $request->username;
        $user->email          = $request->email;
        $user->nip_nik        = $request->nip_nik;
        $user->status_pegawai = $request->status_pegawai;
        $user->id_role        = $request->id_role;
        $user->id_jabatan     = $request->id_jabatan;
        $user->id_bidang      = $request->id_bidang;
        $user->password       = Hash::make($request->password);
        $user->created_id     = Auth::user()->id_pegawai;
        $user->save();

        return redirect()->route('pegawaiIndex')->with('success', 'Data Berhasil Ditambahkan');
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data User',
            'menuAdminUser' => 'active',
            'user' => Pegawai::findOrFail($id),
            'jabatan' => Jabatan::all(),
            'bidang' => Bidang::all(),
        ];
        return view('admin/user/edit', $data);
    }


    public function update(Request $request, $id)
    {
        $user = Pegawai::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'username' => [
                'required',
                Rule::unique('pegawai')->ignore($user->id_pegawai, 'id_pegawai')->whereNull('deleted_at')
            ],
            'nip_nik' => [
                'required',
                Rule::unique('pegawai')->ignore($user->id_pegawai, 'id_pegawai')->whereNull('deleted_at')
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('pegawai')->ignore($user->id_pegawai, 'id_pegawai')->whereNull('deleted_at')
            ],
            'status_pegawai' => 'required',
            'id_jabatan' => 'required',
            'id_bidang' => 'required',
            'password' => 'nullable|confirmed|min:8',
        ], [
            'nama.required' => 'Nama Wajib Diisi',
            'username.required' => 'Username Wajib Diisi',
            'username.unique' => 'Username Sudah Terdaftar',
            'nip_nik.required' => 'NIP/NIK Wajib Diisi',
            'nip_nik.unique' => 'NIP/NIK Sudah Terdaftar',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Format Email Tidak Valid',
            'email.unique' => 'Email Sudah Digunakan',
            'status_pegawai.required' => 'Status Pegawai Wajib Dipilih',
            'id_jabatan.required' => 'Jabatan Wajib Dipilih',
            'id_bidang.required' => 'Bidang Wajib Dipilih',
            'password.confirmed' => 'Password Konfirmasi Tidak Sama',
            'password.min' => 'Password Minimal 8 Karakter',
        ]);

        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->nip_nik = $request->nip_nik;
        $user->email = $request->email;
        $user->status_pegawai = $request->status_pegawai;
        $user->id_jabatan = $request->id_jabatan;
        $user->id_bidang = $request->id_bidang;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->updated_id = Auth::user()->id_pegawai;
        $user->save();

        return redirect()->route('pegawaiIndex')->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->deleted_id = Auth::user()->id_pegawai;
        $pegawai->save();
        $pegawai->delete();

        return redirect()->route('pegawaiIndex')->with('success', 'Data berhasil dihapus.');
    }
}
