@extends('layouts.app')

@section('title', App\Utility::find(1)->nama_website . ' - Ganti Password')

@section('slider-area')
<div class="slider-area2">
    <div class="pb-100 pt-100 hero-overly">
        <div class="container">
            <div class="row justify-content-center text-white">
                <div class="col-lg-6">
                    <div class="pt-80 hero-cap hero-cap2">
                        <h2 class="text-center">GANTI PASSWORD</h2>
                        <form action="{{ route('ganti-password') }}" method="post">
                            @csrf @method('patch')
                            <div class="form-group">
                                <label for="">Password Lama</label>
                                <input type="password" name="password_lama" id="password_lama" class="form-control @error('password_lama') is-invalid @enderror" placeholder="Masukkan Password Lama ..." value="{{ old('password_lama') }}">
                                @error('password_lama') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Password Baru</label>
                                <input type="password" name="password_baru" id="password_baru" class="form-control @error('password_baru') is-invalid @enderror" placeholder="Masukkan Password Baru ..." value="{{ old('password_baru') }}">
                                @error('password_baru') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Ulangi Password Baru</label>
                                <input type="password" name="ulangi_password_baru" id="ulangi_password_baru" class="form-control @error('ulangi_password_baru') is-invalid @enderror" placeholder="Ulangi Password Baru ..." value="{{ old('ulangi_password_baru') }}">
                                @error('ulangi_password_baru') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn header-btn">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
