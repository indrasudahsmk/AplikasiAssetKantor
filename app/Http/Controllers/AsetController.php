<?php

namespace App\Http\Controllers;

use App\Models\AsetPegawai;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsetController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Asset Barang',
            'menuPegawaiAssetSaya' => 'active',
            'assetp'          => AsetPegawai::where('id_pegawai', Auth::user()->id_pegawai)->get(),
        ];
        return view('pegawai/asset/pribadi/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Asset Saya',
            'menuPegawaiAssetSaya' => 'active',
            'assetp'          => AsetPegawai::all(),
            'barang'          => Barang::all(),
        ];
        return view('pegawai/asset/pribadi/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang'    => 'required|exists:barang,id_barang',
            'status'       => 'required',
        ], [
            'id_barang.required'    => 'Barang harus dipilih.',
            'status.required'       => 'Status tidak boleh kosong.',
        ]);

        $assetp = new AsetPegawai();
        $assetp->id_barang          = $request->id_barang;
        $assetp->status             = $request->status;
        $assetp->id_pegawai         = Auth::user()->id_pegawai;
        $assetp->created_id         = Auth::user()->id_pegawai;
        $assetp ->save();


        return redirect()->route('assetsaya')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function destroy($id_aset)
    {
        $assetp = AsetPegawai::findOrFail($id_aset);
        $assetp->deleted_id = Auth::user()->id_pegawai;
        $assetp->save();
        $assetp->delete();

        return redirect()->route('assetsaya')->with('success', 'Data berhasil dihapus');
    }

    public function edit($id_aset)
    {

        $data = [
            'title' => 'Edit Data Barang',
            'assetp'    => AsetPegawai::findOrFail($id_aset),
            'menuPegawaiAssetSaya' => 'active',
            'barang'          => Barang::all(),
        ];
        return view('pegawai/asset/pribadi/edit', $data);
    }

    public function update(Request $request, $id_aset)
    {
        $assetp = AsetPegawai::findOrFail($id_aset);

        $assetp->update([
            'id_barang'       => $request->id_barang,
            'status'          => $request->status,
            'updated_id'      => Auth::user()->id_pegawai,
        ]);

        return redirect()->route('assetsaya')->with('success', 'Data berhasil diperbarui');
    }
}
