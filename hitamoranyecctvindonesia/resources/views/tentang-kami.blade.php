@extends('layouts.app')

@section('title', $utility->nama_website . ' - Tentang Kami')

@section('slider-area')
<div class="slider-area2">
    <div class="pb-100 pt-100 hero-overly">
        <div class="container">
            <div class="row justify-content-center text-white">
                <div class="col-lg-6">
                    <div class="pt-80 hero-cap hero-cap2">
                        <h2 class="text-center">TENTANG KAMI</h2>
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
        <div class="row justify-content-center">
            <div class="col-lg-12 mb-5">
                <!-- Section Tittle -->
                <div class="section-tittle profession-details">
                    <h2>Tentang Kami</h2>
                    <p>{!! nl2br($utility->tentang_kami) !!}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-5">
                <div class="section-tittle profession-details p-5">
                    <h2>Visi</h2>
                    <p>{!! nl2br($utility->visi) !!}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-5">
                <div class="section-tittle profession-details p-5">
                    <h2>Misi</h2>
                    <p>{!! nl2br($utility->misi) !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="m-0">
@endsection
