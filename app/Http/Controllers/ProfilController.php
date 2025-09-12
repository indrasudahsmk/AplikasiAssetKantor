<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    public function edit()
    {
        $title = "Profil Saya";
        $user = Auth::user();
        return view('profil', compact('title', 'user'));
    }

    public function update(Request $request, $id)
    {
        $user = Pegawai::findOrFail($id);

        $request->validate([
            'username' => [
                'required',
                Rule::unique('pegawai', 'username')->ignore($user->id_pegawai, 'id_pegawai')->whereNull('deleted_at'),
            ],
            'nama'     => 'required|string|max:255',
            'email'    => [
                'required',
                'email',
                Rule::unique('pegawai', 'email')->ignore($user->id_pegawai, 'id_pegawai')->whereNull('deleted_at'),
            ],
            'password' => 'nullable|confirmed|min:8',
        ], [
            'username.required' => 'Username tidak boleh kosong.',
            'username.unique'   => 'Username sudah digunakan.',
            'nama.required'     => 'Nama tidak boleh kosong.',
            'email.required'    => 'Email tidak boleh kosong.',
            'email.email'       => 'Format email tidak valid.',
            'email.unique'      => 'Email sudah digunakan.',
            'password.confirmed'=> 'Konfirmasi password tidak cocok.',
            'password.min'      => 'Password minimal 8 karakter.',
        ]);

        $user->username = $request->username;
        $user->nama     = $request->nama;
        $user->email    = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->updated_id = Auth::id();
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Profil berhasil diperbarui.');
    }
}
