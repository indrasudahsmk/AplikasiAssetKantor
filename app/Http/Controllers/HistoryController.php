<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryPengembalianBarang;

class HistoryController extends Controller
{
    public function index()
    {
        $data = [
            'title' =>   'History Pengembalian Barang',
            'menuAdminHistory'  =>  'active',
            'history'   =>  HistoryPengembalianBarang::latest('id')->get(),
        ];
        return view('admin.history', $data);
    }
}
