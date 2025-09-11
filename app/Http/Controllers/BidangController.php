<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Kantor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class BidangController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Bidang',
            'menuAdminBidang' => 'active',
            'bidang' => Bidang::all(),
        ];
        return view('admin.bidang.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Bidang',
            'menuAdminBidang' => 'active',
            'kantor'    => kantor::all(),
        ];
        return view('admin.bidang.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bidang' => [
                'required',
                Rule::unique('bidang')->where(function ($query) use ($request) {
                    return $query->where('id_kantor', $request->kantor)
                        ->whereNull('deleted_at');
                }),
            ],
            'kantor' => 'required',
        ], [
            'nama_bidang.required' => 'Nama bidang tidak boleh kosong.',
            'nama_bidang.unique'   => 'Nama bidang pada kantor tersebut sudah terdaftar.',
            'kantor.required' => 'Kantor tidak boleh kosong.',
        ]);

        $bidang = new Bidang();
        $bidang->nama_bidang = $request->nama_bidang;
        $bidang->id_kantor = $request->kantor;
        $bidang->created_id = Auth::user()->id_pegawai;
        $bidang->save();

        return redirect()->route('bidangIndex')->with('success', 'Data berhasil ditambahkan');
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
            'nama_bidang' => [
                'required',
                Rule::unique('bidang', 'nama_bidang')
                    ->ignore($id, 'id_bidang') // abaikan data yang sedang diedit
                    ->where(function ($query) use ($request) {
                        return $query->where('id_kantor', $request->kantor)
                            ->whereNull('deleted_at');
                    }),
            ],
            'kantor' => 'required',
        ], [
            'nama_bidang.required' => 'Nama bidang tidak boleh kosong.',
            'nama_bidang.unique'   => 'Nama bidang pada kantor ini sudah terdaftar.',
            'kantor.required' => 'Kantor tidak boleh kosong.',
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
