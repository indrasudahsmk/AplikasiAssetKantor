<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tugas;
use App\Exports\TugasExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class TugasController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->jabatan == 'Admin') {
            $data = [
                'title' => 'Data Tugas',
                'menuAdminTugas' => 'active',
                'tugas'          => Tugas::with('user')->get(),
            ];
            return view('admin.tugas.index', $data);
        } else {
            $data = [
                'title' => 'Data Tugas',
                'menuKaryawanTugas' => 'active',
                'tugas'          => Tugas::with('user')->where('user_id', $user->id)->first(),
            ];
            return view('karyawan.tugas.index', $data);
        }
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Tugas',
            'menuAdminTugas' => 'active',
            'user'          => User::where('jabatan', 'Karyawan')->where('is_tugas', false)->get(),
        ];
        return view('admin/tugas/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'tugas' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ], [
            'user_id.required' => 'Nama Wajib Diisi',
            'tugas.required' => 'Tugas Wajib Diisi',
            'tanggal_mulai.required' => 'Tanggal Mulai Wajib Diisi',
            'tanggal_selesai.required' => 'Tanggal Selesai Wajib Diisi',
        ]);

        $user = User::findOrFail($request->user_id);

        $tugas = new Tugas();
        $tugas->user_id = $request->user_id;
        $tugas->tugas = $request->tugas;
        $tugas->tanggal_mulai = $request->tanggal_mulai;
        $tugas->tanggal_selesai = $request->tanggal_selesai;
        $tugas->save();
        $user->is_tugas = true;
        $user->save();

        return redirect()->route('tugas')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Tugas',
            'menuAdminTugas' => 'active',
            'tugas'         => Tugas::with('user')->findOrFail($id),
        ];
        return view('admin/tugas/edit', $data);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'tugas' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ], [
            'tugas.required' => 'Tugas Wajib Diisi',
            'tanggal_mulai.required' => 'Tanggal Mulai Wajib Diisi',
            'tanggal_selesai.required' => 'Tanggal Selesai Wajib Diisi',
        ]);

        $tugas = Tugas::findOrFail($id);
        $tugas->tugas = $request->tugas;
        $tugas->tanggal_mulai = $request->tanggal_mulai;
        $tugas->tanggal_selesai = $request->tanggal_selesai;
        $tugas->save();

        return redirect()->route('tugas')->with('success', 'Data Berhasil DiUbah');
    }

    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);
        $tugas->delete();
        $user = User::where('id', $tugas->user_id)->first();
        $user->is_tugas = false;
        $user->save();
        return redirect()->route('tugas')->with('success', 'Data Berhasil Dihapus');
    }

    public function excel()
    {
        $filename = now()->format('d-m-Y H.i.s');
        return Excel::download(new TugasExport, 'DataTugas_' . $filename . '.xlsx');
    }

    public function pdf()
    {
        $filename = now()->format('d-m-Y H.i.s');
        $data = [
            'tugas' => Tugas::with('user')->get(),
            'date' => now()->format('d-m-Y'),
        ];
        $pdf = Pdf::loadView('admin/tugas/pdf', $data);
        return $pdf->download('DataTugas_' . $filename . '.pdf');
    }

    public function Karyawanpdf()
    {
        $filename = now()->format('d-m-Y H.i.s');
        $user = Auth::user();
        $data = [
            'tugas' => Tugas::with('user')->where('user_id', $user->id)->first(),
            'date' => now()->format('d-m-Y'),
        ];
        $pdf = Pdf::loadView('karyawan/tugas/pdf', $data);
        return $pdf->download('DataTugas_' . $filename . '.pdf');
    }
}
