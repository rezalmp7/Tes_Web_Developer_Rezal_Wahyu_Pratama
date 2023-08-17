<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $produks = Produk::limit(5)->orderBy("id", "desc")->get();

        return view('home', compact(
            'produks'
        ));
    }
}
