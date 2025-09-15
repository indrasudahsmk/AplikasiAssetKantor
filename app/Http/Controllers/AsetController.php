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
            'title' => 'Asset Pegawai',
            'menuAdminAssetPegawai' => 'active',
            'assetp' => AsetPegawai::with(['barang', 'pegawai'])->get(),
        ];
        return view('admin.assetpegawai.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Asset Pegawai',
            'menuAdminAssetPegawai' => 'active',
            'barang' => Barang::where('status_ketersediaan', 'Tersedia')->get(),
            'pegawai' => Pegawai::all(),
        ];
        return view('admin.assetpegawai.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang'  => 'required|exists:barang,id_barang',
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'status'     => 'required|in:Dipinjam, Dikembalikan',
        ]);

        AsetPegawai::create([
            'id_barang'  => $request->id_barang,
            'id_pegawai' => $request->id_pegawai,
            'status'     => $request->status,
            'created_id' => Auth::user()->id_pegawai ?? null,
        ]);

        $barang = Barang::findOrFail($request->id_barang);

        if ($request->status == 'Dipinjam') {
        $barang->status_ketersediaan = 'Tidak Tersedia';
        } elseif ($request->status == 'Dikembalikan') {
            $barang->status_ketersediaan = 'Tersedia';
        }

        $barang->updated_id = Auth::user()->id_pegawai ?? null;
        $barang->save();

        return redirect()->route('assetPegawaiIndex')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $assetpegawai = AsetPegawai::findOrFail($id);
        $id_barang = $assetpegawai->id_barang;

        $data = [
            'title' => 'Edit Asset Pegawai',
            'menuAdminAssetPegawai' => 'active',
            'assetp' => $assetpegawai,
            'barang' => Barang::where('id_barang', $id_barang)->first(),
            'pegawai' => Pegawai::all(),
        ];
        return view('admin.assetpegawai.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang'  => 'required|exists:barang,id_barang',
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'status'     => 'required|in:Dipinjam, Dikembalikan',
        ]);

        $assetpegawai = AsetPegawai::findOrFail($id);
        $assetpegawai->id_barang  = $request->id_barang;
        $assetpegawai->id_pegawai = $request->id_pegawai;
        $assetpegawai->status     = $request->status;
        $assetpegawai->updated_id = Auth::user()->id_pegawai ?? null;
        $assetpegawai->save();

        return redirect()->route('assetPegawaiIndex')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $assetpegawai = AsetPegawai::findOrFail($id);
        $assetpegawai->deleted_id = Auth::user()->id_pegawai ?? null;
        $assetpegawai->save();

        $id_barang = $assetpegawai->barang->id_barang;
        $barang = Barang::findOrFail($id_barang);
        $barang->status_ketersediaan = 'Tersedia';
        $barang->save();

        $assetpegawai->delete();
        return redirect()->route('assetPegawaiIndex')->with('success', 'Data berhasil dihapus');
    }

    public function excel()
    {
        return 'Export Excel asset pegawai belum diimplementasikan';
    }

    public function pdf()
    {
        return 'Export PDF asset pegawai belum diimplementasikan';
    }
}
