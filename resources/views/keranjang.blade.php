@extends('admin.layouts.layoutHome')

@section('content')
        <section class="page-section portfolio mt-5" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Keranjang</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <div class="col-12 m-0 p-0 row">
                        <form method="POST" action="{{ url("/keranjang/update") }}">
                            @csrf
                            <div class="col-md-12">
                                <table class="table table-cart">
                                        <thead>
                                        <tr>
                                            <th class="table-active">Produk</th>
                                            <th class="table-active">Harga</th>
                                            <th class="table-active">Jml</th>
                                            <th class="table-active">Total</th>
                                            <th class="table-active"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalHarga = 0;
                                        @endphp
                                        @foreach ($keranjang as $key => $value)
                                        <tr>
                                            <input type="hidden" class="idPerItem" name="id[]" value="{{ $value->id }}">
                                            <td class="namaPerItem">{{ $value->nama }}</td>
                                            <td class="hargaPerItem">Rp. {{ number_format($value->harga) }}</td>
                                            <td><input type="number" style="width: 100px" class="form-control qtyPerItem" value="{{ $value->qty }}" name="qty[]"></td>
                                            <td class="totalPerItem">Rp {{ number_format($value->harga*$value->qty) }}</td>
                                            <td><a class="btn btn-sm btn-danger" href="{{ url('/') }}/keranjang/delete/{{ $value->id }}">Hapus</a></td>
                                        </tr>
                                        @php
                                            $totalHarga += ($value->harga*$value->qty);
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="col-12 clearfix">
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 my-4 col-centered rounded p-4 p-footer-gray bg-light">
                                    <h5 class="text-dark">Total Belanja</h5>
                                    <table class="table">
                                        <thead>
                                            <tr></tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b class="">Total</b></td>
                                                <td class="text-dark ">Rp {{ number_format($totalHarga) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                    <div class="col-12 row m-0 p-0">
                                        <div class="col-6 p-2">
                                            <p class="text-small">Lanjut Belanja</p>
                                            <a href="{{ url('/') }}/produk" class="btn btn-outline-primary col-12 d-block mt-4">Lanjut Belanja</a>
                                        </div>
                                        <div class="col-6 p-2">
                                            <p class="text-small text-danger">Pastikan Sudah Update</p>
                                            <a href="{{ url('/') }}/keranjang/store" class="btn btn-success col-12 d-block mt-4">Proses</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection