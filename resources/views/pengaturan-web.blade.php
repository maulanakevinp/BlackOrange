@extends('layouts.app')

@section('title', App\Utility::find(1)->nama_website . ' - Pengaturan Website')

@section('styles')
<link rel="stylesheet" href="/assets/css/jquery.fancybox.css">
<style>
    #display-logo:hover{
        cursor: pointer;
        opacity: 0.5;
    }
</style>
@endsection

@section('slider-area')
@include('layouts.components.alert')
<div class="slider-area2">
    <div class="pb-100 pt-100 hero-overly">
        <div class="container">
            <div class="row justify-content-center text-white">
                <div class="col-lg-6">
                    <div class="pt-80 hero-cap hero-cap2">
                        <h2 class="text-center">PENGATURAN WEBSITE</h2>
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
        <form autocomplete="off" class="mt-5" action="{{ route('utility.update') }}" method="post" enctype="multipart/form-data">
            @csrf @method('patch')
            <div class="row justify-content-center text-white">
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="logo">Logo Website</label><br>
                        <img title="Ganti logo website" onclick="document.getElementById('logo').click()" id="display-logo" src="{{ asset(Storage::url($utility->logo)) }}" alt="Logo Website" style="max-height: 100px">
                        <input type="file" name="logo" id="logo" style="display: none">
                        @error('logo') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_website">Nama Website</label>
                        <input type="text" name="nama_website" id="nama_website" class="form-control @error('nama_website') is-invalid @enderror" placeholder="Masukkan Nama Website ..." value="{{ old('nama_website', $utility->nama_website) }}">
                        @error('nama_website') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_perusahaan">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control @error('nama_perusahaan') is-invalid @enderror" placeholder="Masukkan Nama Perusahaan ..." value="{{ old('nama_perusahaan', $utility->nama_perusahaan) }}">
                        @error('nama_perusahaan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat_perusahaan">Alamat Perusahaan</label>
                        <input type="text" name="alamat_perusahaan" id="alamat_perusahaan" class="form-control @error('alamat_perusahaan') is-invalid @enderror" placeholder="Masukkan Alamat Perusahaan ..." value="{{ old('alamat_perusahaan', $utility->alamat_perusahaan) }}">
                        @error('alamat_perusahaan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nomor_telepon">Nomor Telepon</label>
                        <input type="text" onkeypress="return hanyaAngka(event)" name="nomor_telepon" id="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" placeholder="Masukkan Nomor Telepon ..." value="{{ old('nomor_telepon', $utility->nomor_telepon) }}">
                        @error('nomor_telepon') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nomor_whatsapp">Nomor WhatsApp</label>
                        <input type="text" onkeypress="return hanyaAngka(event)" name="nomor_whatsapp" id="nomor_whatsapp" class="form-control @error('nomor_whatsapp') is-invalid @enderror" placeholder="Masukkan Nomor WhatsApp ..." value="{{ old('nomor_whatsapp', $utility->nomor_whatsapp) }}">
                        @error('nomor_whatsapp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Nomor WhatsApp ..." value="{{ old('email', $utility->email) }}">
                        @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="maps">Maps</label> <a href="/storage/bantuan/maps.webm" title="bantuan" data-fancybox><i class="fas fa-question-circle"></i></a>
                        <input type="text" name="maps" id="maps" class="form-control @error('maps') is-invalid @enderror" placeholder="Masukkan Maps ..." value="{{ old('maps', $utility->maps) }}">
                        @error('maps') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="link_facebook">Link Facebook</label>
                        <input type="url" name="link_facebook" id="link_facebook" class="form-control @error('link_facebook') is-invalid @enderror" placeholder="Masukkan Link Facebook ..." value="{{ old('link_facebook', $utility->link_facebook) }}">
                        @error('link_facebook') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="link_instagram">Link Instagram</label>
                        <input type="url" name="link_instagram" id="link_instagram" class="form-control @error('link_instagram') is-invalid @enderror" placeholder="Masukkan Link Instagram ..." value="{{ old('link_instagram', $utility->link_instagram) }}">
                        @error('link_instagram') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="link_twitter">Link Twitter</label>
                        <input type="url" name="link_twitter" id="link_twitter" class="form-control @error('link_twitter') is-invalid @enderror" placeholder="Masukkan Link Twitter ..." value="{{ old('link_twitter', $utility->link_twitter) }}">
                        @error('link_twitter') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="link_youtube">Link Youtube</label>
                        <input type="url" name="link_youtube" id="link_youtube" class="form-control @error('link_youtube') is-invalid @enderror" placeholder="Masukkan Link Youtube ..." value="{{ old('link_youtube', $utility->link_youtube) }}">
                        @error('link_youtube') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="slogan">Slogan</label>
                        <input type="text" name="slogan" id="slogan" class="form-control @error('slogan') is-invalid @enderror" placeholder="Masukkan Slogan ..." value="{{ old('slogan', $utility->slogan) }}">
                        @error('slogan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="kalimat_penarik_pelanggan">Kalimat Penarik Pelanggan</label>
                        <input type="text" name="kalimat_penarik_pelanggan" id="kalimat_penarik_pelanggan" class="form-control @error('kalimat_penarik_pelanggan') is-invalid @enderror" placeholder="Masukkan Kalimat Penarik Pelanggan ..." value="{{ old('kalimat_penarik_pelanggan', $utility->kalimat_penarik_pelanggan) }}">
                        @error('kalimat_penarik_pelanggan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="form-group">
                        <label for="tentang_kami">Tentang Kami</label>
                        <textarea name="tentang_kami" id="tentang_kami" class="form-control @error('tentang_kami') is-invalid @enderror" placeholder="Masukkan Tentang Kami ..." rows="10">{{ old('tentang_kami', $utility->tentang_kami) }}</textarea>
                        @error('tentang_kami') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="visi">Visi</label>
                        <textarea name="visi" id="visi" class="form-control @error('visi') is-invalid @enderror" placeholder="Masukkan Visi ..." rows="10">{{ old('visi', $utility->visi) }}</textarea>
                        @error('visi') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="misi">Misi</label>
                        <textarea name="misi" id="misi" class="form-control @error('misi') is-invalid @enderror" placeholder="Masukkan Misi ..." rows="10">{{ old('misi', $utility->misi) }}</textarea>
                        @error('misi') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<hr class="m-0">
@endsection

@push('scripts')
<script src="/assets/js/jquery.fancybox.js"></script>
<script>
    $(document).ready(function() {
        $("#logo").on('change', function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $("#display-logo").attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>
@endpush
