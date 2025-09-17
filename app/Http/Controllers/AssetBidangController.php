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
            'barang' => Barang::where('status_ketersediaan', 'Tersedia')->get(),
            'bidang' => Bidang::all(),
        ];
        return view('admin.assetbidang.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id_barang',
            'id_bidang' => 'required|exists:bidang,id_bidang',
            'status'    => 'required|in:Aktif,Mutasi',
        ]);

        AssetBidang::create([
            'id_barang'  => $request->id_barang,
            'id_bidang'  => $request->id_bidang,
            'status'     => $request->status,
            'created_id' => Auth::user()->id_pegawai ?? null,
        ]);

        $barang = Barang::findOrFail($request->id_barang);

        $barang->status_ketersediaan = 'Tidak Tersedia';
        $barang->updated_id = Auth::user()->id_pegawai;
        $barang->save();

        return redirect()->route('assetBidangIndex')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $assetbidang = AssetBidang::findOrFail($id);
        $id_barang = $assetbidang->id_barang;
        $data = [
            'title' => 'Edit Asset Bidang',
            'menuAdminAssetBidang' => 'active',
            'assetbidang' => AssetBidang::findOrFail($id),
            'barang' => Barang::where('id_barang', $id_barang)->first(),
            'bidang' => Bidang::all(),
        ];
        return view('admin.assetbidang.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id_barang',
            'id_bidang' => 'required|exists:bidang,id_bidang',
            'status'    => 'required|in:Aktif,Mutasi',
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
        $id_barang = $assetbidang->barang->id_barang;

        $barang = Barang::findOrFail($id_barang);
        $barang->status_ketersediaan = 'Tersedia';
        $barang->save();
        $assetbidang->delete();
        return redirect()->route('assetBidangIndex')->with('success', 'Asset Berhasil Dikembalikan');
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
