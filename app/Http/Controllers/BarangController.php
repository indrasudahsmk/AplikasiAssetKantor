<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Tipe;
use App\Models\Barang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Barang',
            'barang' => Barang::all(),
        ];
        return view('admin.barang.barang.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Barang',
            'jenis'    => JenisBarang::all(),
            'merk'    => Merk::all(),
            'tipe'    => Tipe::all(),
        ];
        return view('admin.barang.barang.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|max:35',
            'nama_barang' => ['required', Rule::unique('barang','nama_barang')->whereNull('deleted_at')],
            'id_jenis'    => 'required|exists:jenis_barang,id',
            'id_merk'     => 'required|exists:merk,id',
            'id_tipe'     => 'required|exists:tipe,id',
            'tahun_pembelian' => 'nullable|integer',
            'harga'           => 'nullable|numeric',
            'nomor_register'  => 'nullable|max:50',
            'no_pabrik'       => 'nullable|max:50',
            'no_rangka'       => 'nullable|max:50',
            'no_mesin'        => 'nullable|max:50',
            'keterangan'      => 'nullable|string',
        ], [
            'kode_barang.required' => 'Kode barang tidak boleh kosong.',
            'kode_barang.max'      => 'Panjang maksimal kode barang adalah 35 karakter.',
            'nama_barang.required' => 'Nama barang tidak boleh kosong.',
            'nama_barang.max'      => 'Panjang maksimal nama barang adalah 50 karakter.',
            'nama_barang.unique'   => 'Nama barang sudah terdaftar.',
            'id_jenis.required'    => 'Jenis barang harus dipilih.',
            'id_merk.required'     => 'Merk harus dipilih.',
            'id_tipe.required'     => 'Tipe harus dipilih.',
        ]);

        $barang = new Barang();
        $barang->kode_barang     = $request->kode_barang;
        $barang->nama_barang     = $request->nama_barang;
        $barang->id_jenis        = $request->id_jenis;
        $barang->id_merk         = $request->id_merk;
        $barang->id_tipe         = $request->id_tipe;
        $barang->nomor_register  = $request->nomor_register;
        $barang->tahun_pembelian = $request->tahun_pembelian;
        $barang->harga           = $request->harga;
        $barang->no_pabrik       = $request->no_pabrik;
        $barang->no_rangka       = $request->no_rangka;
        $barang->no_mesin        = $request->no_mesin;
        $barang->keterangan      = $request->keterangan;
        $barang->created_id      = Auth::user()->id_pegawai ?? null;
        $barang->save();

        return redirect()->route('barang')->with('success', 'Data berhasil ditambahkan');
    }




    public function edit($id)
    {

        $data = [
            'title' => 'Edit Data Barang',
            'barang'    => Barang::findOrFail($id),
            'jenis'    => JenisBarang::all(),
            'merk'    => Merk::all(),
            'tipe'    => Tipe::all(),
        ];
        return view('admin.barang.barang.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'kode_barang' => 'required|max:35',
            'nama_barang' => ['required', Rule::unique('barang','nama_barang')->whereNull('deleted_at')->ignore($id, 'id_barang')],
            'id_jenis'    => 'required|exists:jenis_barang,id',
            'id_merk'     => 'required|exists:merk,id',
            'id_tipe'     => 'required|exists:tipe,id',
            'tahun_pembelian' => 'nullable|integer',
            'harga'           => 'nullable|numeric',
            'nomor_register'  => 'nullable|max:50',
            'no_pabrik'       => 'nullable|max:50',
            'no_rangka'       => 'nullable|max:50',
            'no_mesin'        => 'nullable|max:50',
            'keterangan'      => 'nullable|string',
        ], [
            'kode_barang.required' => 'Kode barang tidak boleh kosong.',
            'kode_barang.max'      => 'Panjang maksimal kode barang adalah 35 karakter.',
            'nama_barang.required' => 'Nama barang tidak boleh kosong.',
            'nama_barang.max'      => 'Panjang maksimal nama barang adalah 50 karakter.',
            'nama_barang.unique'   => 'Nama barang sudah terdaftar.',
            'id_jenis.required'    => 'Jenis barang harus dipilih.',
            'id_merk.required'     => 'Merk harus dipilih.',
            'id_tipe.required'     => 'Tipe harus dipilih.',
        ]);

        $barang = Barang::findOrFail($id);

        $barang->update([
            'kode_barang'     => $request->kode_barang,
            'nama_barang'     => $request->nama_barang,
            'id_jenis'        => $request->id_jenis,
            'id_merk'         => $request->id_merk,
            'id_tipe'         => $request->id_tipe,
            'nomor_register'  => $request->nomor_register,
            'tahun_pembelian' => $request->tahun_pembelian,
            'harga'           => $request->harga,
            'no_pabrik'       => $request->no_pabrik,
            'no_rangka'       => $request->no_rangka,
            'no_mesin'        => $request->no_mesin,
            'keterangan'      => $request->keterangan,
            'updated_id'      => Auth::user()->id_pegawai,
        ]);

        return redirect()->route('barang')->with('success', 'Data berhasil diperbarui');
    }




    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->deleted_id = Auth::user()->id_pegawai;
        $barang->save();
        $barang->delete();

        return redirect()->route('barang')->with('success', 'Data berhasil dihapus');
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
