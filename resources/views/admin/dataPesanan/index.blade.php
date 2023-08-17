@extends('admin.layouts.layoutAdmin')

@section('content')
    
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pesanan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Pesanan</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header clearfix">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table class="table" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemesan</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                            <th>Tanggal Tranasksi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksis as $key => $transaksi)
                                        <tr>
                                            <th>{{ $key+1 }}</th>
                                            <th>
                                                {{ $transaksi->nama }}
                                                <hr class="m-0 p-0" />
                                                {{ $transaksi->email }}
                                            </th>
                                            <th>{{ $transaksi->jenis_kelamin }}</th>
                                            <th>{{ $transaksi->status }}</th>
                                            <th>{{ date("d-m-Y", strtotime($transaksi->tgl_transaksi)) }}</th>
                                            <th>{{ $transaksi->alamat }}</th>
                                            {{-- <th> --}}
                                                {{-- <a class="btn btn-sm btn-primary" href="{{ url('/') }}/dataPesanan/detail/{{ $user->id }}">Edit</a> --}}
                                            {{-- </th> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
@endsection