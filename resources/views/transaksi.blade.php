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
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($transaksi as $key => $value) {
                                ?>
                                <tr>
                                    <td style="font-family: Consolas, monaco, monospace;">#{{ $key+1 }}</td>
                                    <td><?php echo date('d F Y', strtotime($value->tgl_transaksi)); ?></td>
                                    <td><span class="badge bg-primary">{{ $value->status }}</span></td>
                                    <td>
                                        <a href="{{ url('/') }}/transaksi/detail/{{ $value->id }}" class="btn btn-sm btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
@endsection