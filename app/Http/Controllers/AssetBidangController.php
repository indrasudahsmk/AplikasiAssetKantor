<?php

namespace App\Http\Controllers;

use App\Models\AssetBidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetBidangController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Asset Bidang',
            'menuAdminBidang' => 'active',
            'assetbidang' => AssetBidang::all(),
        ];
        return view('admin.assetbidang.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Bidang',
            'menuAdminBidang' => 'active',
            'kantor'    => kantor::all(),
        ];
        return view('admin.assetbidang.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bidang' => 'required',
            'kantor' => 'required',
        ], [
            'nama_bidang.required' => 'Nama kantor tidak boleh kosong.',
            'kantor.required' => 'Alamat tidak boleh kosong.',
        ]);

        $bidang = new Bidang();
        $bidang->nama_bidang = $request->nama_bidang;
        $bidang->id_kantor = $request->kantor;
        $bidang->created_id = Auth::user()->id_pegawai;
        $bidang->save();

        return redirect()->route('assetBidangIndex')->with('success', 'Data berhasil ditambahkan');
    }



    public function edit($id)
    {

        $data = [
            'title' => 'Edit Data Bidang',
            'menuAdminKantor' => 'active',
            'bidang' => Bidang::findOrFail($id),
            'kantor' => Kantor::all(),
        ];
        return view('admin.bidang.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bidang' => 'required',
            'kantor' => 'required',
        ], [
            'nama_bidang.required' => 'Nama kantor tidak boleh kosong.',
            'kantor.required' => 'Alamat tidak boleh kosong.',
        ]);

        $bidang = Bidang::findOrFail($id);
        $bidang->nama_bidang = $request->nama_bidang;
        $bidang->id_kantor = $request->kantor;
        $bidang->updated_id = Auth::user()->id_pegawai;
        $bidang->save();

        return redirect()->route('bidangIndex')->with('success', 'Data berhasil diperbarui');
    }



    public function destroy($id)
    {
        $bidang = Bidang::findOrFail($id);
        $bidang->deleted_id = Auth::user()->id_pegawai;
        $bidang->save();
        $bidang->delete();

        return redirect()->route('bidangIndex')->with('success', 'Data berhasil dihapus');
    }

    public function excel()
    {
        return 'Export Excel kantor belum diimplementasikan';
    }

    public function pdf()
    {
        return 'Export PDF kantor belum diimplementasikan';
    }
}
