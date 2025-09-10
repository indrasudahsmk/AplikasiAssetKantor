<?php

namespace App\Http\Controllers;

use App\Models\AssetBidang;
use App\Models\Barang;
use App\Models\Bidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetBidangController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Asset Bidang',
            'menuAdminAssetBidang' => 'active',
            'assetbidang' => AssetBidang::with(['barang', 'bidang'])->get(),
        ];
        return view('admin.assetbidang.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Asset Bidang',
            'menuAdminAssetBidang' => 'active',
            'barang' => Barang::all(),
            'bidang' => Bidang::all(),
        ];
        return view('admin.assetbidang.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id_barang',
            'id_bidang' => 'required|exists:bidang,id_bidang',
            'status'    => 'required|in:aktif,nonaktif',
        ]);

        AssetBidang::create([
            'id_barang'  => $request->id_barang,
            'id_bidang'  => $request->id_bidang,
            'status'     => $request->status,
            'created_id' => Auth::user()->id_pegawai ?? null,
        ]);

        return redirect()->route('assetBidangIndex')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Asset Bidang',
            'menuAdminAssetBidang' => 'active',
            'assetbidang' => AssetBidang::findOrFail($id),
            'barang' => Barang::all(),
            'bidang' => Bidang::all(),
        ];
        return view('admin.assetbidang.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id_barang',
            'id_bidang' => 'required|exists:bidang,id_bidang',
            'status'    => 'required|in:aktif,nonaktif',
        ]);

        $assetbidang = AssetBidang::findOrFail($id);
        $assetbidang->id_barang  = $request->id_barang;
        $assetbidang->id_bidang  = $request->id_bidang;
        $assetbidang->status     = $request->status;
        $assetbidang->updated_id = Auth::user()->id_pegawai ?? null;
        $assetbidang->save();

        return redirect()->route('assetBidangIndex')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $assetbidang = AssetBidang::findOrFail($id);
        $assetbidang->deleted_id = Auth::user()->id_pegawai ?? null;
        $assetbidang->save();
        $assetbidang->delete();

        return redirect()->route('assetBidangIndex')->with('success', 'Data berhasil dihapus');
    }

    public function excel()
    {
        return 'Export Excel asset bidang belum diimplementasikan';
    }

    public function pdf()
    {
        return 'Export PDF asset bidang belum diimplementasikan';
    }
}
