@extends('admin.layouts.layoutHome')

@section('content')
        <section class="page-section portfolio mt-5" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Produk</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <div class="col-12 m-0 p-0 row">
                        <div class="col-6 p-3">
                            <img src="{{ $produk->gambar; }}" class="col-12" />
                        </div>
                        <div class="col m-0 p-3 fs-7 fm-inter">
                            <h3 class="fw-semibold mb-4">{{ $produk->nama; }}</h3>
                            <table class="my-2">
                                <tr>
                                    <td class="fw-semibold pe-5 py-1">Jumlah</td>
                                    <td>: {{ number_format($produk->stok).' '.$produk->satuan }}</td>
                                </tr>
                            </table>
                            <div class="col-12 m-0 p-0 fw-medium">
                                {{ $produk->description}}
                            </div>
                            <div class="col-12 m-0 p-0 mt-5 pt-5">
                                <div class="fs-1 fw-semibold">
                                    <span class="fw-normal fs-7">Rp</span> {{number_format($produk->harga).' / '.$produk->satuan }}
                                </div>
                                <div class="col-12 row m-0 p-0">
                                    <a href="{{ url('/') }}/keranjang/add/{{$produk->id}}" class="btn btn-success col-12 d-block mt-4">
                                        Simpan Ke Keranjang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection