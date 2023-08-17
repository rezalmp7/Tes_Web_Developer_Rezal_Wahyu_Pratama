<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class DataPesananController extends Controller
{
    public function index() {
        $transaksis = Transaksi::leftJoin('users', 'transaksis.users_id', '=', 'users.id')->get();

        return view('admin.dataPesanan.index', compact('transaksis'));
    }
}
