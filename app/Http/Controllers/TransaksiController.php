<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index() {
        $transaksi = Transaksi::all();

        return view('transaksi', compact('transaksi'));
    }

    public function detail($id) {
        $transaksi = Transaksi::select(['transaksis.users_nama', 'transaksis.status', 'transaksis.tgl_transaksi', 'users.*'])->leftJoin('users', 'transaksis.users_id', '=', 'users.id')->where('transaksis.id', $id)->first();
        $pesanan = Pesanan::where('transaksis_id', $id)->get();

        return view('transaksiDetail', compact('transaksi', 'pesanan'));
    }
}
