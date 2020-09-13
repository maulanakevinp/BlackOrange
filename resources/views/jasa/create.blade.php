@extends('layouts.app')

@section('title', App\Utility::find(1)->nama_website . ' - Tambah Jasa & Layanan')

@section('slider-area')
<div class="slider-area2">
    <div class="pb-100 pt-100 hero-overly">
        <div class="container">
            <div class="pt-80 hero-cap hero-cap2">
                <h2 class="text-center">TAMBAH JASA & LAYANAN</h2>
                <form autocomplete="off" class="mt-5" action="{{ route('jasa.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="produk_atau_jasa" value="2">
                    <div class="row justify-content-center text-white">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama_produk">Nama</label>
                                <input type="nama_produk" name="nama_produk" id="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" placeholder="Masukkan Nama ..." value="{{ old('nama_produk') }}">
                                @error('nama_produk') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="produk">Produk</label>
                                <input type="text" name="produk" id="produk" class="form-control @error('produk') is-invalid @enderror" placeholder="Masukkan Produk ..." value="{{ old('produk') }}">
                                @error('produk') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror" placeholder="Masukkan Kategori ..." value="{{ old('kategori') }}">
                                @error('kategori') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="sub_kategori">Sub Kategori</label>
                                <input type="text" name="sub_kategori" id="sub_kategori" class="form-control @error('sub_kategori') is-invalid @enderror" placeholder="Masukkan Sub Kategori ..." value="{{ old('sub_kategori') }}">
                                @error('sub_kategori') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga ..." value="{{ old('harga') }}">
                                @error('harga') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="bukalapak">Link Bukalapak</label>
                                <input type="text" name="bukalapak" id="bukalapak" class="form-control @error('bukalapak') is-invalid @enderror" placeholder="Masukkan Link Bukalapak ..." value="{{ old('bukalapak') }}">
                                @error('bukalapak') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="tokopedia">Link Tokopedia</label>
                                <input type="text" name="tokopedia" id="tokopedia" class="form-control @error('tokopedia') is-invalid @enderror" placeholder="Masukkan Link Tokopedia ..." value="{{ old('tokopedia') }}">
                                @error('tokopedia') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="olx">Link OLX</label>
                                <input type="text" name="olx" id="olx" class="form-control @error('olx') is-invalid @enderror" placeholder="Masukkan Link OLX ..." value="{{ old('olx') }}">
                                @error('olx') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="shopee">Link Shopee</label>
                                <input type="text" name="shopee" id="shopee" class="form-control @error('shopee') is-invalid @enderror" placeholder="Masukkan Link Shopee ..." value="{{ old('shopee') }}">
                                @error('shopee') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi ..." rows="10">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="/jasa" class="btn bg-secondary">Batal</a>
                                <button type="submit" class="btn">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
