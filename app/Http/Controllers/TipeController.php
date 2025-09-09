<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TipeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Tipe Barang',
            'menuAdminTipe' => 'active',
            'tipe'          => Tipe::orderBy('id', 'desc')->get(),
        ];
        return view('admin/barang/tipe/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Tipe Barang',
            'menuAdminTipe' => 'active',
        ];
        return view('admin/barang/tipe/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe'           => 'required|unique:tipe,tipe',
        ], [
            'tipe.required'  => 'Nama Wajib Diisi',
            'tipe.unique'    => 'Nama Sudah Terdaftar',
        ]);

        $tipe = new Tipe();
        $tipe->tipe           = $request->tipe;
        $tipe->created_id     = Auth::user()->id_pegawai;
        $tipe ->save();


        return redirect()->route('tipe')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        $tipe = Tipe::findOrFail($id);
        $tipe->deleted_id = Auth::user()->id_pegawai;
        $tipe->save();
        $tipe->delete();
        return redirect()->route('tipe')->with('success', 'Data Berhasil Dihapus');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Tipe Barang',
            'menuAdminTipe' => 'active',
            'tipe' => Tipe::findOrFail($id),
        ];
        return view('admin/barang/tipe/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipe' => 'required|unique:tipe,tipe',
        ], [
            'tipe.required' => 'Nama Wajib Diisi',
            'tipe.unique'   => 'Nama Sudah Terdaftar',
        ]);

        $tipe = Tipe::findOrFail($id);
        $tipe->tipe = $request->tipe;
        $tipe->updated_id = Auth::user()->id_pegawai;
        $tipe->save();

        return redirect()->route('tipe')->with('success', 'Data Berhasil Di Edit');
    }
}
