<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerkController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Merk Barang',
            'menuAdminMerk' => 'active',
            'merk'          => Merk::orderBy('id', 'desc')->get(),
        ];
        return view('admin/barang/merk/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Merk Barang',
            'menuAdminMerk' => 'active',
        ];
        return view('admin/barang/merk/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk'           => 'required',
        ], [
            'merk.required'  => 'Nama Wajib Diisi',
        ]);

        $merk = new Merk();
        $merk->merk           = $request->merk;
        $merk->created_id     = Auth::user()->id_pegawai;
        $merk ->save();


        return redirect()->route('merk')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        $merk = Merk::findOrFail($id);
        $merk->deleted_id = Auth::user()->id_pegawai;
        $merk->save();
        $merk->delete();
        return redirect()->route('merk')->with('success', 'Data Berhasil Dihapus');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Merk Barang',
            'menuAdminMerk' => 'active',
            'merk' => Merk::findOrFail($id),
        ];
        return view('admin/barang/merk/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'merk' => 'required',
        ], [
            'merk.required' => 'Nama Wajib Diisi',
        ]);

        $merk = Merk::findOrFail($id);
        $merk->updated_id = Auth::user()->id_pegawai;
        $merk->merk = $request->merk;
        $merk->save();

        return redirect()->route('merk')->with('success', 'Data Berhasil Di Edit');
    }
}
