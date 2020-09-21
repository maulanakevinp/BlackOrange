@extends('layouts.app')

@section('title', App\Utility::find(1)->nama_website . ' - Login')

@section('slider-area')
<div class="slider-area2">
    <div class="pb-100 pt-100 hero-overly">
        <div class="container">
            <div class="row justify-content-center text-white">
                <div class="col-lg-10">
                    <div class="pt-80 hero-cap hero-cap2">
                        <h2 class="text-center">{{ $message }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
