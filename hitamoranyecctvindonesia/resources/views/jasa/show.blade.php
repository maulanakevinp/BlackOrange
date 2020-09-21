@extends('layouts.app')

@section('title', $produk->nama_produk . ' - ' . App\Utility::find(1)->nama_website)
@section('description', $produk->nama_produk . '. Rp. ' . substr(number_format($produk->harga, 2, ',', '.'),0,-3))
@section('styles')
<meta property="og:image" content="{{ asset(Storage::url($produk->images[0]->foto)) }}">
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
                <div class="col-lg-8">
                    <div class="pt-80 hero-cap hero-cap2 text-center">
                        <h2>{{ $produk->nama_produk }}</h2>
                        <p class="text-white">{{ $produk->produk }}{{ $produk->kategori ? ', ' . $produk->kategori: ''}}{{ $produk->sub_kategori ? ', ' . $produk->sub_kategori: ''}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="profession-caption mt-5">
    <div class="container">
        <!-- Section Tittle -->
        <div class="section-tittle profession-details">
            <h2>DESKRIPSI JASA & LAYANAN</h2>
            <p>{!! nl2br($produk->deskripsi) !!}</p>
        </div>
    </div>
</div>
<div class="slider-area2 container pt-100 pb-100">
    <div class="hero-cap hero-cap2">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-sm-center justify-content-md-between text-center text-lg-left">
            <h3>GAMBAR JASA & LAYANAN</h3>
        </div>
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
<section id="kontak" class="wantToWork-area w-padding2">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-8 col-lg-8 col-md-8 mb-4">
                <div class="wantToWork-caption wantToWork-caption2">
                    <h2>Apakah Anda Mencari {{ $produk->nama_produk }} ?</h2>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-3 mb-3">
                <a target="_blank" href="https://api.whatsapp.com/send?phone={{ App\Utility::find(1)->nomor_whatsapp }}&text=Halo%20Black%20Orange%20CCTV%20saya%20tertarik%20dengan%20produk%20ini%0A{{ URL::current() }}" class="btn btn-black f-right">Hubungi kami segera</a>
            </div>
            @if ($produk->bukalapak || $produk->tokopedia || $produk->shopee || $produk->olx)
                <div class="col-12 text-center">
                    <h2 class="mb-5">Pesan Melalui</h2>
                    @if ($produk->bukalapak)
                        <a target="_blank" href="{{ $produk->bukalapak }}" class="mx-5"><img height="100px" src="/assets/img/logo/bukalapak.png" alt="bukalapak"></a>
                    @endif

                    @if ($produk->tokopedia)
                        <a target="_blank" href="{{ $produk->tokopedia }}" class="mx-5"><img height="100px" src="/assets/img/logo/tokopedia.png" alt="tokopedia"></a>
                    @endif

                    @if ($produk->shopee)
                        <a target="_blank" href="{{ $produk->shopee }}" class="mx-5"><img height="100px" src="/assets/img/logo/shopee.png" alt="shopee"></a>
                    @endif

                    @if ($produk->olx)
                        <a target="_blank" href="{{ $produk->olx }}" class="mx-5"><img height="100px" src="/assets/img/logo/olx.png" alt="olx"></a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>
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
            url: "{{ route('image.show', $produk->id) }}?page="+page,
            method: "GET",
            beforeSend: function () {
                $("#loading").show();
            },
            success: function (response) {
                $("#loading").hide();

                if (response.data.length == 0) {
                    dataExists = false;
                }

                if (page == 1 && dataExists == false) {
                    showNothing();
                }

                if (response.next_page_url == null) {
                    dataExists = false;
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
