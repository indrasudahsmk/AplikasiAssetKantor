<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JenisBController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Jenis Barang',
            'menuAdminJenis' => 'active',
            'jenis'          => JenisBarang::orderBy('id', 'desc')->get(),
        ];
        return view('admin/barang/jenis/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Jenis Barang',
            'menuAdminJenis' => 'active',
        ];
        return view('admin/barang/jenis/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_barang'           => 'required',
        ], [
            'jenis_barang.required'  => 'Nama Wajib Diisi',
        ]);

        $jenis = new JenisBarang();
        $jenis->jenis_barang          = $request->jenis_barang;
        $jenis->created_id     = Auth::user()->id_pegawai;
        $jenis ->save();


        return redirect()->route('jenis')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        $jenis = JenisBarang::findOrFail($id);
        $jenis->deleted_id = Auth::user()->id_pegawai;
        $jenis->save();
        $jenis->delete();
        return redirect()->route('jenis')->with('success', 'Data Berhasil Dihapus');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Jenis Barang',
            'menuAdminJenis' => 'active',
            'jenis' => JenisBarang::findOrFail($id),
        ];
        return view('admin/barang/jenis/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_barang' => 'required',
        ], [
            'jenis_barang.required' => 'Nama Wajib Diisi',
        ]);

        $jenis = JenisBarang::findOrFail($id);
        $jenis->updated_id = Auth::user()->id_pegawai;
        $jenis->jenis_barang = $request->jenis_barang;
        $jenis->save();

        return redirect()->route('jenis')->with('success', 'Data Berhasil Di Edit');
    }
}
