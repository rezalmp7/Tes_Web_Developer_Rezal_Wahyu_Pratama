@extends('admin.layouts.layoutAdmin')

@section('content')
    
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Kustomer</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Produk</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header clearfix">
                                <i class="fas fa-table me-1"></i>
                                Data Produk
                                <a href="{{ url('/') }}/dataProduk/create" class="btn btn-sm btn-success float-end">Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produks as $key => $produk)
                                        <tr>
                                            <th>{{ $key+1 }}</th>
                                            <th>
                                                <img class="rounded" style="height:100px" src="{{ $produk->gambar }}" />
                                            </th>
                                            <th>{{ $produk->nama }}</th>
                                            <th>{{ "Rp ".number_format($produk->harga) }}</th>
                                            <th>{{ $produk->stok." ".$produk->satuan }}</th>
                                            <th>
                                                <form onsubmit="confirm('Apakah ingin menghapus produk')" action="{{ route('dataProduk.destroy',$produk->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('dataProduk.edit',$produk->id) }}">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
@endsection