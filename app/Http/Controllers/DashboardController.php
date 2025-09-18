<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\User;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            'title' => 'Dashboard',
            'menuDashboard' => 'active',
            'user'  =>  Pegawai::all()->count(),
            'total_semua_asset'    =>  Barang::all()->sum('harga'),
            'admin' =>  Pegawai::where('id_role',1)->count(),
            'admin_bidang' =>  Pegawai::where('id_role',2)->count(),
            'pegawai'   =>  Pegawai::where('id_role',0)->count()
        ];
        return view('dashboard', $data);
    }
}
