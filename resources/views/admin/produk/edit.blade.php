@extends('admin.layouts.layoutAdmin')

@section('content')
    
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}/produk">Produk</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                        <div class="card col-12 mb-4">
                            <div class="card-header clearfix">
                                <i class="fas fa-table me-1"></i>
                                Edit Produk
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('dataProduk.update', $produk->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <img class="rounded" height="100" src="{{ $produk->gambar }}" />
                                        <label for="inputGambar">Gambar</label>
                                        <input class="form-control" id="inputGambar" name="gambar" type="file" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputNama">Nama</label>
                                        <input class="form-control" id="inputNama" name="nama" type="text" value="{{ $produk->nama }}" placeholder="Nama Produk" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputHarga">Harga</label>
                                        <input class="form-control" id="inputHarga" name="harga" type="number" value="{{$produk->harga}}" placeholder="200000" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputStok">Stok</label>
                                        <input class="form-control" id="inputStok" name="stok" type="number" value="{{$produk->stok}}" placeholder="200" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputSatuan">Satuan</label>
                                        <input class="form-control" id="inputSatuan" name="satuan" type="text" value="{{$produk->satuan}}" placeholder="Kilogram" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputAlamat">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" id="inputDeskripsi" cols="30" rows="10" required>{{ $produk->deskripsi }}</textarea>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
@endsection