<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class DataProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::all();
        return view('admin.produk.index', compact("produks"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'deskripsi' => 'required',
        ]);
        
        if ($request->hasFile('gambar')) {
            $imageName = time().'_gambar_.'.$request->gambar->extension(); 

            $image_path = $request->gambar->move(public_path('storage/produk'), $imageName);

            $image_path_to_upload = asset('/storage/produk/'.$imageName);
        } else {
            $image_path_to_upload = null;
        }

        $data = array(
            'gambar' => $image_path_to_upload,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'description' => $request->deskripsi
        );

        Produk::create($data);

        return redirect('/dataProduk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::whereId($id)->first();
        return view('admin.produk.edit', compact("produk"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->ToArray());
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'deskripsi' => 'required',
        ]);

        $produkLama = Produk::whereId($id)->first();
        
        if ($request->hasFile('gambar')) {
            $imageName = time().'_gambar_.'.$request->gambar->extension(); 

            $image_path = $request->gambar->move(public_path('storage/produk'), $imageName);

            $image_path_to_upload = asset('/storage/produk/'.$imageName);
        } else {
            $image_path_to_upload = $produkLama->gambar;
        }
        
        $data = array(
            'gambar' => $image_path_to_upload,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'description' => $request->deskripsi
        );

        Produk::whereId($id)->update($data);

        return redirect('/dataProduk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produk::whereId($id)->delete();
        
        return redirect(url('/dataProduk'));
    }
}
