<?php

namespace App\Http\Controllers;

use App\Models\AssetBidang;
use App\Models\Barang;
use App\Models\Bidang;
use App\Models\MutasiAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MutasiAssetController extends Controller
{
    public function index()
    {
        return view('admin.mutasi_asset.index', [
            'title' => 'Mutasi Asset Bidang',
            'menuAdminMutasi' => 'active',
            'mutasi' => MutasiAsset::with(['barang', 'dariBidang', 'keBidang'])
                ->latest('id_mutasi')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('admin.mutasi_asset.create', [
            'title' => 'Tambah Mutasi Aset',
            'menuAdminMutasi' => 'active',
            'barang' => Barang::all(),
            'bidang' => Bidang::all(),
            'assetbidang'   =>  AssetBidang::where('status', 'Aktif')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang'      => 'required|exists:barang,id_barang',
            'dari_bidang'    => 'required|exists:bidang,id_bidang',
            'ke_bidang'      => 'required|exists:bidang,id_bidang|different:dari_bidang',
            'tanggal_mutasi' => 'required|date',
        ], [
            'id_barang.required'      => 'Barang wajib dipilih.',
            'dari_bidang.required'    => 'Bidang asal wajib dipilih.',
            'ke_bidang.required'      => 'Bidang tujuan wajib dipilih.',
            'ke_bidang.different'     => 'Bidang tujuan tidak boleh sama dengan bidang asal.',
            'tanggal_mutasi.required' => 'Tanggal mutasi wajib diisi.',
        ]);

        $mutasi = new MutasiAsset();
        $mutasi->id_barang      = $validated['id_barang'];
        $mutasi->dari_bidang    = $validated['dari_bidang'];
        $mutasi->ke_bidang      = $validated['ke_bidang'];
        $mutasi->tanggal_mutasi = $validated['tanggal_mutasi'];
        $mutasi->created_id     = Auth::user()->id_pegawai;
        $mutasi->save();

        $assetbidang = AssetBidang::where('id_barang', $validated['id_barang'])->first();
        if ($assetbidang) {
            $assetbidang->status = 'Mutasi'; 
            $assetbidang->save();
        }

        return redirect()->route('mutasiIndex')->with('success', 'Data mutasi aset berhasil ditambahkan.');
    }


    public function edit($id_mutasi)
    {
        return view('admin.mutasi_asset.edit', [
            'title' => 'Edit Mutasi Aset',
            'menuAdminMutasi' => 'active',
            'mutasi' => MutasiAsset::findOrFail($id_mutasi),
            'barang' => Barang::all(),
            'bidang' => Bidang::all(),
        ]);
    }

    public function update(Request $request, $id_mutasi)
    {
        $validated = $request->validate([
            'id_barang'      => 'required|exists:barang,id_barang',
            'dari_bidang'    => 'required|exists:bidang,id_bidang',
            'ke_bidang'      => 'required|exists:bidang,id_bidang|different:dari_bidang',
            'tanggal_mutasi' => 'required|date',
        ]);

        $mutasi = MutasiAsset::findOrFail($id_mutasi);
        $mutasi->update([
            'id_barang'      => $validated['id_barang'],
            'dari_bidang'    => $validated['dari_bidang'],
            'ke_bidang'      => $validated['ke_bidang'],
            'tanggal_mutasi' => $validated['tanggal_mutasi'],
            'updated_id'     => Auth::user()->id_pegawai,
        ]);

        return redirect()->route('mutasiIndex')->with('success', 'Data mutasi aset berhasil diperbarui.');
    }

    public function destroy($id_mutasi)
    {
        $mutasi = MutasiAsset::findOrFail($id_mutasi);

        $mutasi->deleted_id = Auth::user()->id_pegawai;
        $mutasi->save();
        $assetbidang = AssetBidang::where('id_barang', $mutasi->id_barang)->first();
        if ($assetbidang) {
            $assetbidang->status = 'Aktif'; 
            $assetbidang->save();
        }
        $mutasi->delete();
        
        return redirect()->route('mutasiIndex')->with('success', 'Asset Berhasil Dikembalikan');
    }
}
