<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index() {
        $userLogin = Auth::user();
        $keranjang = Keranjang::select(["keranjangs.id", "produks.nama", "produks.harga", "keranjangs.qty"])->leftJoin("produks", "keranjangs.produks_id", "=", "produks.id")->where('keranjangs.users_id', $userLogin->id)->get();

        return view('keranjang', compact('keranjang'));
    }

    public function add($id) {
        $userLogin = Auth::user();

        $checkingKeranjang = Keranjang::where('users_id', $userLogin->id)->where('produks_id', $id)->first();

        $produk = Produk::whereId($id)->first();
        if($checkingKeranjang != null) {
            $data = array(
                "qty" => $checkingKeranjang->qty+1,
            );

            Keranjang::whereId($checkingKeranjang->id)->update($data);
        } else {
            $data = array(
                "produks_id" => $id,
                "qty" => 1,
                "users_id" => $userLogin->id
            );

            Keranjang::create($data);
        }

        return redirect(url('/keranjang'));
    }

    public function update(Request $request) {
        foreach ($request->id as $key => $value) {
            Keranjang::whereId($value)->update(['qty' => $request->qty[$key]]);
        }

        return redirect(url('/keranjang'));
    }

    public function delete($id) {
        Keranjang::whereId($id)->delete();

        return redirect(url('/keranjang'));
    }

    public function store(Request $request) {
        $userLogin = Auth::user();
        $keranjang = Keranjang::select(["keranjangs.id as id_keranjang", "produks.*", "keranjangs.qty"])->leftJoin("produks", "keranjangs.produks_id", "=", "produks.id")->where('keranjangs.users_id', $userLogin->id)->get();

        $dataTransaksi = array(
            "users_id" => $userLogin->id,
            "users_nama" => $userLogin->nama,
            "status" => "pending",
            "tgl_transaksi" => date("YmdHmi"),
        );

        $transaksi = Transaksi::create($dataTransaksi);
        foreach ($keranjang as $key => $value) {
            $data = array(
                "transaksis_id" => $transaksi->id,
                "produks_id" => $value->id,
                "nama" => $value->nama,
                "harga" => $value->harga,
                "satuan" => $value->satuan,
                "gambar" => $value->gambar,
                "qty" => $value->qty
            );

            $pesanan = Pesanan::create($data);

            Keranjang::whereId($value->id_keranjang)->delete();
        }

        return redirect(url('/transaksi'));
    }
}
