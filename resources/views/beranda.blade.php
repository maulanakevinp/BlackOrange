@extends('layouts.app')

@section('title', config('app.name') . ' - Beranda')

@section('slider-area')
<div class="slider-area">
    <div class="slider-active dot-style">
        <!-- Single Slider -->
        <div class="single-slider slider-height hero-overly d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="hero__caption">
                            <span data-animation="fadeInLeft" data-delay=".4s">Welcome to Intorior</span>
                            <h1 data-animation="fadeInLeft" data-delay=".6s">Modern Interior & Design</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Slider -->
        <div class="single-slider slider-height hero-overly d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="hero__caption">
                            <span data-animation="fadeInLeft" data-delay=".4s">Welcome to Intorior</span>
                            <h1 data-animation="fadeInLeft" data-delay=".6s">Modern Interior & Design</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video icon -->
    <div class="video-icon">
        <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=1aP-TXUpNoU">
            <i class="fas fa-play"></i>
        </a>
    </div>
</div>
@endsection

@section('content')
<!--? our info Start -->
<div class="our-info-area pt-170 pb-100 section-bg" data-background="assets/img/gallery/section_bg02.jpg">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="single-info mb-60">
                    <div class="info-caption">
                        <h4>Clean and Services</h4>
                        <p>For each project we establish relationships with partners who we know will help us.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="single-info mb-60">
                    <div class="info-caption">
                        <h4>Clean and Modern</h4>
                        <p>For each project we establish relationships with partners who we know will help us.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="single-info mb-60">
                    <div class="info-caption">
                        <h4>Clean and Modern</h4>
                        <p>For each project we establish relationships with partners who we know will help us.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our Info start -->

<!--? Professional Services Start -->
<div class="professional-services section-bg d-none d-md-block" data-background="assets/img/gallery/section_bg04.jpg">
</div>
<div class="profession-caption">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <!-- Section Tittle -->
                <div class="section-tittle profession-details">
                    <span>Our Professional Services</span>
                    <h2>We will create modern and first class intorior.</h2>
                    <p>Aorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                        incididunt ut labore.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="about.html" class="btn btn3">Discover More About Ous</a>
            </div>
        </div>
    </div>
</div>
<!-- Professional Services End -->
<!-- our info End -->

<!--? Services Ara Start -->
<div class="services-area section-padding3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="cl-xl-7 col-lg-8 col-md-10">
                <!-- Section Tittle -->
                <div class="section-tittle text-center mb-70">
                    <span>Our Professional Services</span>
                    <h2>Best Interitor Services</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
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
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="single-services mb-200">
                    <div class="services-img">
                        <img src="assets/img/gallery/services2.png" alt="">
                    </div>
                    <div class="services-caption">
                        <h3><a href="services.html">Interior Design</a></h3>
                        <p class="pera1">For each project we establish </p>
                        <p class="pera2">For each project we establish relationships with partners who we know
                            will help us. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="single-services mb-200">
                    <div class="services-img">
                        <img src="assets/img/gallery/services3.png" alt="">
                    </div>
                    <div class="services-caption">
                        <h3><a href="services.html">Office Decoretion</a></h3>
                        <p class="pera1">For each project we establish </p>
                        <p class="pera2">For each project we establish relationships with partners who we know
                            will help us. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services Ara End -->

<!--? Gallery Area Start -->
<div class="gallery-area">
    <div class="container-fluid p-0 fix">
        <div class="row">
            <div class="col-xl-6 col-lg-4 col-md-6">
                <div class="single-gallery mb-30">
                    <div class="gallery-img" style="background-image: url(assets/img/gallery/gallery1.png);">
                    </div>
                    <div class="thumb-content-box">
                        <div class="thumb-content">
                            <h3><span>Intorior</span>Burj Khalifa</h3>
                            <a href="work.html"><i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="single-gallery mb-30">
                    <div class="gallery-img" style="background-image: url(assets/img/gallery/gallery2.png);">
                    </div>
                    <div class="thumb-content-box">
                        <div class="thumb-content">
                            <h3><span>Intorior</span>Burj Khalifa</h3>
                            <a href="work.html"><i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="single-gallery mb-30">
                    <div class="gallery-img" style="background-image: url(assets/img/gallery/gallery3.png);">
                    </div>
                    <div class="thumb-content-box">
                        <div class="thumb-content">
                            <h3><span>Intorior</span>Burj Khalifa</h3>
                            <a href="work.html"><i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="single-gallery mb-30">
                    <div class="gallery-img" style="background-image: url(assets/img/gallery/gallery4.png);">
                    </div>
                    <div class="thumb-content-box">
                        <div class="thumb-content">
                            <h3><span>Intorior</span>Burj Khalifa</h3>
                            <a href="work.html"><i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="single-gallery mb-30">
                    <div class="gallery-img" style="background-image: url(assets/img/gallery/gallery5.png);">
                    </div>
                    <div class="thumb-content-box">
                        <div class="thumb-content">
                            <h3><span>Intorior</span>Burj Khalifa</h3>
                            <a href="work.html"><i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-4 col-md-6">
                <div class="single-gallery mb-30">
                    <div class="gallery-img" style="background-image: url(assets/img/gallery/gallery6.png);">
                    </div>
                    <div class="thumb-content-box">
                        <div class="thumb-content">
                            <h3><span>Intorior</span>Burj Khalifa</h3>
                            <a href="work.html"><i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Gallery Area End -->

<!-- Team Start -->
<div class="team-area section-padding30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="cl-xl-7 col-lg-8 col-md-10">
                <!-- Section Tittle -->
                <div class="section-tittle text-center mb-70">
                    <span>Creative derector</span>
                    <h2>Best Interitor Services</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single Tem -->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                <div class="single-team mb-30">
                    <div class="team-img">
                        <img src="assets/img/gallery/team2.png" alt="">
                    </div>
                    <div class="team-caption">
                        <h3><a href="#">Jhon Sunsa</a></h3>
                        <span>Creative derector</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                <div class="single-team mb-30">
                    <div class="team-img">
                        <img src="assets/img/gallery/team3.png" alt="">
                    </div>
                    <div class="team-caption">
                        <h3><a href="#">Jhon Sunsa</a></h3>
                        <span>Creative derector</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                <div class="single-team mb-30">
                    <div class="team-img">
                        <img src="assets/img/gallery/team1.png" alt="">
                    </div>
                    <div class="team-caption">
                        <h3><a href="#">Jhon Sunsa</a></h3>
                        <span>Creative derector</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

<!-- Testimonial Start -->
<div class="testimonial-area testimonial-padding">
    <div class="container">
        <!-- Testimonial contents -->
        <div class="row d-flex justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-10">
                <div class="h1-testimonial-active dot-style">
                    <!-- Single Testimonial -->
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
                    <!-- Single Testimonial -->
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- Brand Area Start -->
<div class="brand-area pt-120 pb-120">
    <div class="container">
        <div class="brand-active brand-border pt-50 pb-40">
            <div class="single-brand">
                <img src="assets/img/gallery/brand1.png" alt="">
            </div>
            <div class="single-brand">
                <img src="assets/img/gallery/brand2.png" alt="">
            </div>
            <div class="single-brand">
                <img src="assets/img/gallery/brand3.png" alt="">
            </div>
            <div class="single-brand">
                <img src="assets/img/gallery/brand4.png" alt="">
            </div>
            <div class="single-brand">
                <img src="assets/img/gallery/brand2.png" alt="">
            </div>
            <div class="single-brand">
                <img src="assets/img/gallery/brand5.png" alt="">
            </div>
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
                    <h2>Are you Searching For a First-Class Consultant?</h2>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-3">
                <a href="#" class="btn btn-black f-right">Contact Us</a>
            </div>
        </div>
    </div>
</section>
<!-- Want To work End -->

<!-- Blog Area Start -->
<div class="home-blog-area section-padding30">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center mb-70">
                    <span>Our latest blog</span>
                    <h2>Our recent news</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="home-blog-single mb-30">
                    <div class="blog-img-cap">
                        <div class="blog-img">
                            <img src="assets/img/gallery/home_blog1.png" alt="">
                        </div>
                        <ul>
                            <li class="black-bg">October 27, 2020</li>
                            <li>By Admin - 30 Likes - 4 Comments</li>
                        </ul>
                        <div class="blog-cap">
                            <h3><a href="blog_details.html">16 Easy Ideas to Use Everyday
                                    Stuff in Kitchen.</a></h3>
                            <a href="blog_details.html" class="more-btn">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="home-blog-single mb-30">
                    <div class="blog-img-cap">
                        <div class="blog-img">
                            <img src="assets/img/gallery/home_blog2.png" alt="">
                        </div>
                        <ul>
                            <li class="black-bg">October 27, 2020</li>
                            <li>By Admin - 30 Likes - 4 Comments</li>
                        </ul>
                        <div class="blog-cap">
                            <h3><a href="blog_details.html">16 Easy Ideas to Use Everyday
                                    Stuff in Kitchen.</a></h3>
                            <a href="blog_details.html" class="more-btn">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Area End -->
@endsection
