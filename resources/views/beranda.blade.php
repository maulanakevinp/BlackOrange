@extends('layouts.app')

@section('title', $utility->nama_website . ' - Beranda')

@section('slider-area')
<div class="slider-area">
    <!-- Single Slider -->
    <div class="single-slider pt-150 pb-100 hero-overly d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="hero__caption">
                        <span data-animation="fadeInLeft" data-delay=".4s">Welcome to {{ $utility->nama_website }}</span>
                        <h1 data-animation="fadeInLeft" data-delay=".6s">{{ $utility->slogan }}</h1>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div id="owl-one" class="owl-carousel">
                        @foreach ($slideshows as $slideShow)
                            <img style="max-height: 350px" class="mw-100" src="{{ asset(Storage::url($slideShow->foto)) }}" alt="hero">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<!--? our info Start -->
<div class="our-info-area section-bg" data-background="assets/img/gallery/section_bg02.jpg">

</div>
<!-- Our Info start -->

<!--? Professional Services Start -->
<div class="profession-caption mt-5">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <!-- Section Tittle -->
                <div class="section-tittle profession-details">
                    <h2>Tentang Kami</h2>
                    <p>{!! nl2br($utility->tentang_kami) !!}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="/tentang-kami" class="btn btn3">Lihat Lebih Lengkap Tentang Kami</a>
            </div>
        </div>
    </div>
</div>
<!-- Professional Services End -->
<!-- our info End -->

@if($products->count() > 0)
    <!--? Services Ara Start -->
    <div class="services-area pt-100 pb-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="cl-xl-7 col-lg-8 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-70">
                        <h2>Produk-Produk Kami</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="single-services mb-200">
                            <div class="services-img">
                                <img src="{{ url(Storage::url($product->images[0]->foto)) }}" alt="{{ $product->nama_produk }}">
                            </div>
                            <div class="services-caption">
                                <h3><a href="{{ route("produk.show", ['produk' => $product, 'slug' => Str::slug($product->nama_produk)]) }}" title="Detail Produk">{{ $product->nama_produk }}</a></h3>
                                <p class="pera1 h4">
                                    Rp. {{ substr(number_format($product->harga, 2, ',', '.'),0,-3) }}
                                </p>
                                <p class="pera2 h4">
                                    Rp. {{ substr(number_format($product->harga, 2, ',', '.'),0,-3) }}
                                </p>
                                <div class="float-left">
                                    {{ $product->produk }}{{ $product->kategori ? ', ' . $product->kategori : '' }}{{ $product->sub_kategori ? ', ' . $product->sub_kategori : '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="/produk" class="btn">Lihat Lebih Banyak Produk</a>
            </div>
        </div>
    </div>
    <!-- Services Ara End -->
@endif

@if($services->count() > 0)
    <!--? Services Ara Start -->
    <div class="services-area pt-100 pb-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="cl-xl-7 col-lg-8 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-70">
                        <h2>Jasa & Layanan Kami</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($services as $product)
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="single-services mb-200">
                            <div class="services-img">
                                <img src="{{ url(Storage::url($product->images[0]->foto)) }}" alt="{{ $product->nama_produk }}">
                            </div>
                            <div class="services-caption">
                                <h3><a href="{{ route("jasa.show", ['produk' => $product, 'slug' => Str::slug($product->nama_produk)]) }}" title="Detail Produk">{{ $product->nama_produk }}</a></h3>
                                <p class="pera1 h4">
                                    Rp. {{ substr(number_format($product->harga, 2, ',', '.'),0,-3) }}
                                </p>
                                <p class="pera2 h4">
                                    Rp. {{ substr(number_format($product->harga, 2, ',', '.'),0,-3) }}
                                </p>
                                <div class="float-left">
                                    {{ $product->produk }}{{ $product->kategori ? ', ' . $product->kategori : '' }}{{ $product->sub_kategori ? ', ' . $product->sub_kategori : '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="/jasa" class="btn">Lihat Lebih Banyak Jasa & Layanan</a>
            </div>
        </div>
    </div>
    <!-- Services Ara End -->
@endif

@if($testimonials->count() > 0)
    <!-- Testimonial Start -->
    <div class="testimonial-area testimonial-padding">
        <div class="container">
            <!-- Testimonial contents -->
            <div class="row d-flex justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-10">
                    <div class="h1-testimonial-active dot-style">
                        @foreach ($testimonial as $testimonial)
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <div class="testimonial-top-cap">
                                        <img src="assets/img/gallery/testi-logo.png" alt="">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                                    </div>
                                    <!-- founder -->
                                    <div class="testimonial-founder  ">
                                        <div class="founder-img">
                                            <span><strong>Christine Eve</strong> - Co Founder</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endif

<!-- Brand Area Start -->
<div class="container pt-100 pb-100">
    <div id="owl-two" class="owl-carousel">
        @foreach ($brands as $brand)
            <img class="px-3" style="max-height: 150px;" src="{{ asset(Storage::url($brand->foto)) }}" alt="">
        @endforeach
    </div>
</div>
<!-- Brand Area End -->

<!-- Want To work -->
<section id="kontak" class="wantToWork-area w-padding2">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-8 col-lg-8 col-md-8">
                <div class="wantToWork-caption wantToWork-caption2">
                    <h2>{{ $utility->kalimat_penarik_pelanggan }}</h2>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-3">
                <a href="https://api.whatsapp.com/send?phone={{ $utility->nomor_whatsapp }}&text=Halo%20Black%20Orange%20CCTV%20saya%20tertarik%20dengan%20produk%20dan%20jasa%20yang%20anda%20tawarkan" class="btn btn-black f-right">Hubungi kami segera</a>
            </div>
        </div>
    </div>
</section>
<!-- Want To work End -->
{!! $utility->maps !!}
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#owl-one').owlCarousel({
            loop:true,
            autoplay:true,
            autoplayTimeout:3000,
            smartSpeed:1000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });
        $('#owl-two').owlCarousel({
            loop:true,
            autoplay:true,
            autoplayTimeout:3000,
            smartSpeed:1000,
            autoplayHoverPause:true,
            responsive:{
                300:{
                    items:2
                },
                500:{
                    items:2
                },
                700:{
                    items:3
                },
                800:{
                    items:4
                },
                1000:{
                    items:5
                }
            }
        });
    });
</script>
@endpush
