@extends('layouts.app')

@section('title', App\Utility::find(1)->nama_website . ' - Beranda')

@section('slider-area')
<div class="slider-area">
    <!-- Single Slider -->
    <div class="single-slider slider-height hero-overly d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="hero__caption">
                        <span data-animation="fadeInLeft" data-delay=".4s">Welcome to Black Orange CCTV</span>
                        <h1 data-animation="fadeInLeft" data-delay=".6s">Specialist CCTV & Security System</h1>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="owl-carousel">
                        @foreach (App\SlideShow::all() as $slideShow)
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
        <!-- Section Tittle -->
        <div class="section-tittle profession-details">
            <h2>Tentang Kami</h2>
            {!! App\Utility::find(1)->tentang_kami !!}
        </div>
    </div>
</div>
<!-- Professional Services End -->
<!-- our info End -->

@if(App\Product::count() > 0)
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
                @foreach (App\Product::latest(3) as $item)
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="single-services mb-200">
                            <div class="services-img">
                                <img src="assets/img/gallery/services1.png" alt="">
                            </div>
                            <div class="services-caption">
                                <h3><a href="services.html">Lighting</a></h3>
                                <p class="pera1">For each project we establish </p>
                                <p class="pera2">For each project we establish relationships with partners who we know
                                    will help us. </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Services Ara End -->
@endif

@if(App\Testimonial::all()->count() > 0)
    <!-- Testimonial Start -->
    <div class="testimonial-area testimonial-padding">
        <div class="container">
            <!-- Testimonial contents -->
            <div class="row d-flex justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-10">
                    <div class="h1-testimonial-active dot-style">
                        @foreach (App\Testimonial::all() as $testimonial)
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
<div class="brand-area pt-3 pb-3">
    <div class="container">
        <div class="brand-active brand-border pt-50 pb-50 justify-content-center">
            @foreach (App\Brand::all() as $brand)
                <div class="single-brand">
                    <img src="{{ asset(Storage::url($brand->foto)) }}" alt="">
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Brand Area End -->

<!-- Want To work -->
<section class="wantToWork-area w-padding2">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-8 col-lg-8 col-md-8">
                <div class="wantToWork-caption wantToWork-caption2">
                    <h2>Apakah anda mencari specialist cctv dan security system?</h2>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-3">
                <a href="https://api.whatsapp.com/send?phone={{ App\Utility::find(1)->nomor_whatsapp }}&text=Halo%20Black%20Orange%20CCTV%20saya%20tertarik%20dengan%20produk%20dan%20jasa%20yang%20anda%20tawarkan" class="btn btn-black f-right">Hubungi kami segera</a>
            </div>
        </div>
    </div>
</section>
<!-- Want To work End -->

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
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
    });
</script>
@endpush
