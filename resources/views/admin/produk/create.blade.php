@extends('admin.layouts.layoutAdmin')

@section('content')
    
                <main>
                    <div class="container-fluid col-12 px-4">
                        <h1 class="mt-4">Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}/dataProduk">Produk</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header clearfix">
                                <i class="fas fa-table me-1"></i>
                                Tambah Produk
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('dataProduk.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="inputGambar">Gambar</label>
                                        <input class="form-control" id="inputGambar" name="gambar" type="file" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputNama">Nama</label>
                                        <input class="form-control" id="inputNama" name="nama" type="text" placeholder="Nama Produk" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputHarga">Harga</label>
                                        <input class="form-control" id="inputHarga" name="harga" type="number" placeholder="200000" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputStok">Stok</label>
                                        <input class="form-control" id="inputStok" name="stok" type="number" placeholder="200" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputSatuan">Satuan</label>
                                        <input class="form-control" id="inputSatuan" name="satuan" type="text" placeholder="Kilogram" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputAlamat">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" id="inputDeskripsi" cols="30" rows="10" required></textarea>
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