<?php

namespace App\Http\Controllers;

use App\Models\AsetPegawai;
use App\Models\Barang;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsetController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Asset Barang',
            'menuAdminAssetPegawai' => 'active',
            'assetp'          => AsetPegawai::all(),
            'pegawai'         => Pegawai::all(),
        ];
        return view('admin/assetpegawai/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Asset Pegawai',
            'menuAdminAssetPegawai' => 'active',
            'assetp'          => AsetPegawai::all(),
            'barang'          => Barang::all(),
            'pegawai'         => Pegawai::all(),
        ];
        return view('admin/assetpegawai/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang'    => 'required|exists:barang,id_barang',
            'id_pegawai'  => 'required|exists:pegawai,id_pegawai',
            'status'       => 'required',
        ], [
            'id_barang.required'    => 'Barang harus dipilih.',
            'id_pegawai.required'  => 'Pegawai harus dipilih.',
            'status.required'       => 'Status tidak boleh kosong.',
        ]);

        $assetp = new AsetPegawai();
        $assetp->id_barang          = $request->id_barang;
        $assetp->status             = $request->status;
        $assetp->id_pegawai         = $request->id_pegawai;
        $assetp->created_id         = Auth::user()->id_pegawai;
        $assetp ->save();


        return redirect()->route('assetPegawaiIndex')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function destroy($id_aset)
    {
        $assetp = AsetPegawai::findOrFail($id_aset);
        $assetp->deleted_id = Auth::user()->id_pegawai;
        $assetp->save();
        $assetp->delete();

        return redirect()->route('assetPegawaiIndex')->with('success', 'Data berhasil dihapus');
    }

    public function edit($id_aset)
    {

        $data = [
            'title' => 'Edit Data Barang',
            'assetp'    => AsetPegawai::findOrFail($id_aset),
            'menuAdminAssetSaya' => 'active',
            'barang'          => Barang::all(),
            'pegawai'         => Pegawai::all(),
        ];
        return view('admin/assetpegawai/edit', $data);
    }

    public function update(Request $request, $id_aset)
    {
        $assetp = AsetPegawai::findOrFail($id_aset);

        $assetp->update([
            'id_barang'       => $request->id_barang,
            'id_pegawai'      => $request->id_pegawai,
            'status'          => $request->status,
            'updated_id'      => Auth::user()->id_pegawai,
        ]);

        return redirect()->route('assetPegawaiIndex')->with('success', 'Data berhasil diperbarui');
    }

    public function indexpegawai()
    {
        $data = [
            'title' => 'Data Asset Barang',
            'menuPegawaiAssetSaya' => 'active',
            'assetp'          => AsetPegawai::where('id_pegawai', Auth::user()->id_pegawai)->get(),
            
        ];
        return view('pegawai/asset/pribadi/index', $data);
    }
}
