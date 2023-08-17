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
                    <div class="col-12 m-0 p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <address>
                                            <strong>Pemesan:</strong><br>
                                            {{ $transaksi->users_nama }}<br>
                                            {{ $transaksi->alamat }}<br>
                                        </address>
                                    </div>
                                    <div class="col-6 text-end">
                                        <address>
                                            <b>Tanggal Transaksi</b><br>
                                            {{ date('d F Y', strtotime($transaksi->created_at)) }}<br>
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-4">
                                    </div>
                                    <div class="col-6 mt-4 text-end">
                                        <address>
                                            <strong>Status:</strong><br>
                                            <span class="badge bg-primary">{{ $transaksi->status }}</span>
                                            <br><br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <div class="p-2">
                                        <h3 class="font-size-16"><strong>Order summary</strong></h3>
                                    </div>
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="table-active">Produk</th>
                                                        <th class="table-active">Harga</th>
                                                        <th class="table-active">Jml</th>
                                                        <th class="table-active">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $totalHarga = 0;
                                                    @endphp
                                                    @foreach ($pesanan as $key => $value)
                                                    <tr>
                                                        <td class="namaPerItem">{{ $value->nama }}</td>
                                                        <td class="hargaPerItem">Rp. {{ number_format($value->harga) }}</td>
                                                        <td>{{ $value->qty }}</td>
                                                        <td class="totalPerItem">{{ 'Rp. '.number_format($value->harga*$value->qty) }}</td>
                                                    </tr>
                                                    @php
                                                        $totalHarga += ($value->harga*$value->qty);
                                                    @endphp
                                                    @endforeach
                                                </tbody>
                                                <tfoot class="fw-bold">
                                                    <tr>
                                                        <td colspan="3">Total</td>
                                                        <td><?php echo 'Rp. '.number_format($totalHarga); ?></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- end row -->
                    </div>
                </div>
            </div>
        </section>
@endsection