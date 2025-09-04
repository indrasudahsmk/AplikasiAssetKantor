<?php

namespace App\Http\Controllers;

use App\Models\Kantor;
use Illuminate\Http\Request;

class KantorController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Kantor',
            'menuAdminKantor' => 'active',
            'kantor' => Kantor::all(),
        ];
        return view('admin.kantor.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Kantor',
            'menuAdminKantor' => 'active',
        ];
        return view('admin.kantor.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kantor' => 'required|max:100',
            'alamat' => 'required',
        ]);

        $kantor = new Kantor();
        $kantor->kantor = $request->kantor;
        $kantor->alamat = $request->alamat;
        $kantor->save();

        return redirect()->route('kantorIndex')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit($id)
    {
        $kantor = Kantor::findOrFail($id);

        $data = [
            'title' => 'Edit Data Kantor',
            'menuAdminKantor' => 'active',
            'kantor' => $kantor,
        ];
        return view('admin.kantor.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kantor' => 'required|max:100',
            'alamat' => 'required',
        ]);

        $kantor = Kantor::findOrFail($id);
        $kantor->update($request->only(['kantor', 'alamat']));

        return redirect()->route('kantorIndex')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kantor = Kantor::findOrFail($id);
        $kantor->delete();

        return redirect()->route('kantorIndex')->with('success', 'Data berhasil dihapus');
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
