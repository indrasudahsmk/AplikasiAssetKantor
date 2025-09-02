<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            'title' => 'Dashboard',
            'menuDashboard' => 'active'
        ];
        return view('dashboard', $data);
    }
}
