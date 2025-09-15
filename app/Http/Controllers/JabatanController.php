<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class JabatanController extends Controller
{
    public function index()
    {
        return view('admin.jabatan.index', [
            'title' => 'Data Jabatan',
            'menuAdminJabatan' => 'active',
            'jabatan' => Jabatan::latest('id_jabatan')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.jabatan.create', [
            'title' => 'Tambah Data Jabatan',
            'menuAdminJabatan' => 'active',
        ]);
    }

    public function store(Request $request)
    {
        // Validasi dengan tabel 'jabatan' agar tidak duplikat
        $validated = $request->validate([
            'jabatan' => ['required', Rule::unique('jabatan','jabatan')->whereNull('deleted_at')],
        ], [
            'jabatan.required' => 'Nama Jabatan wajib diisi.',
            'jabatan.unique' => 'Nama Jabatan sudah ada, tidak boleh duplikat.',
        ]);

        Jabatan::create([
            'jabatan' => $validated['jabatan'],
            'created_id' => Auth::user()->id_pegawai,
        ]);

        return redirect()->route('jabatan')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id_jabatan)
    {
        return view('admin.jabatan.edit', [
            'title' => 'Edit Data Jabatan',
            'menuAdminJabatan' => 'active',
            'jabatan' => Jabatan::findOrFail($id_jabatan),
        ]);
    }

    public function update(Request $request, $id_jabatan)
    {
        $validated = $request->validate([
            'jabatan' =>  ['required','string','max:100',
            Rule::unique('jabatan', 'jabatan')
            ->whereNull('deleted_at')
            ->ignore($id_jabatan, 'id_jabatan'),
        ],  
        ], [
            'jabatan.required' => 'Nama Jabatan wajib diisi.',
            'jabatan.unique' => 'Nama Jabatan sudah ada, tidak boleh duplikat.',
        ]);

        $jabatan = Jabatan::findOrFail($id_jabatan);
        $jabatan->update([
            'jabatan' => $validated['jabatan'],
            'updated_id' => Auth::user()->id_pegawai,
        ]);

        return redirect()->route('jabatan')->with('success', 'Data berhasil diedit.');
    }

    public function destroy($id_jabatan)
    {
        $jabatan = Jabatan::findOrFail($id_jabatan);
        $jabatan->update([
            'deleted_id' => Auth::user()->id_pegawai,
        ]);
        $jabatan->delete();

        return redirect()->route('jabatan')->with('success', 'Data berhasil dihapus.');
    }
}