@extends('layouts.app')

@section('title', App\Utility::find(1)->nama_website . ' - Gallery')

@section('styles')
<link rel="stylesheet" href="/assets/css/jquery.fancybox.css">
<style>
    img.zoom {
        width: 100%;
        height: 200px;
        border-radius: 5px;
        object-fit: cover;
        -webkit-transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
        -ms-transition: all .3s ease-in-out;
    }
    img.zoom:hover {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -o-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>
@endsection

@section('slider-area')
<div class="slider-area2">
    <div class="pb-100 pt-100 hero-overly">
        <div class="container">
            <div class="row justify-content-center text-white">
                <div class="col-lg-6">
                    <div class="pt-80 hero-cap hero-cap2">
                        <h2 class="text-center">GALLERY</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="slider-area2 container pt-100 pb-100">
    <div class="hero-cap hero-cap2">
        <div id="gallery" class="row mt-5"></div>
        <div id="loading" class="row">
            <div class="col-lg-4 col-md-6 mb-3">
                <img src="/assets/img/img-lazy-loading.gif" class="zoom img-fluid"  alt="Loading">
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <img src="/assets/img/img-lazy-loading.gif" class="zoom img-fluid"  alt="Loading">
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <img src="/assets/img/img-lazy-loading.gif" class="zoom img-fluid"  alt="Loading">
            </div>
        </div>
    </div>
</div>

<hr class="m-0">
@endsection

@push('scripts')
<script src="/assets/js/jquery.fancybox.js"></script>
<script>
    let page = 1;
    let dataExists = true;

    load_more(page);

    $(window).scroll(function() { //detect page scroll
        if($(window).scrollTop() + $(window).height() >= $(document).height() - $("footer").height()) { //if user scrolled from top to bottom of the page
            if (dataExists) {
                page++; //page number increment
                load_more(page); //load content
            }
        }
    });

    function load_more(page) {
        $.ajax({
            url: "/load-gallery?page="+page,
            method: "GET",
            beforeSend: function () {
                $("#loading").show();
            },
            success: function (response) {
                $("#loading").hide();

                if (response.next_page_url == null) {
                    dataExists = false;
                }

                if (page == 1 && dataExists == false) {
                    showNothing();
                }

                $.each(response.data, function(index,result){
                    showImage(result);
                });
            }
        });
    }

    function showImage(result){
        $("#gallery").append(`
            <div class="col-lg-4 col-md-6 mb-3">
                <a href="${result.foto.replace('public','/storage')}" data-fancybox="images">
                    <img src="${result.foto.replace('public','/storage')}" class="zoom img-fluid" alt="${result.caption}">
                </a>
            </div>
        `);
    }

    function showNothing(){
        $("#gallery").append(`
            <div class="col">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h4 class="text-dark">Data belum tersedia</h4>
                    </div>
                </div>
            </div>
        `);
    }
</script>
@endpush
