<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index() {
        $produks = Produk::all();

        return view('produk', compact("produks"));
    }
    public function detail($id) {
        $produk = Produk::find($id);

        return view('produkDetail', compact('produk'));
    }
}
