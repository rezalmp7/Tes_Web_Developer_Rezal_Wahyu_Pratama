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
                    <!-- Portfolio Item 1-->
                    @foreach ($produks as $produk)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a class="portfolio-item mx-auto" style="color: black; text-decoration: none;" href="{{ url('/') }}/produk/detail/{{ $produk->id }}">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ $produk->gambar }}" alt=">{{ $produk->nama }}" />
                            <h4>{{ $produk->nama }}</h4>
                            <p>Rp {{ number_format($produk->harga) }}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
@endsection