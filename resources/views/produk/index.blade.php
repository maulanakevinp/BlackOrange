@extends('layouts.app')

@section('title', App\Utility::find(1)->nama_website . ' - Produk')

@section('slider-area')
<div class="slider-area2">
    <div class="pb-100 pt-100 hero-overly">
        <div class="container">
            <div class="hero-cap hero-cap2 text-center pt-80">
                <h2>PRODUK</h2>
                <p class="text-white">{{ request('produk') != '' ? request('produk') : '' }}{{ request('kategori') != '' ? ', ' . request('kategori') : '' }}{{ request('sub_kategori') != '' ? ', ' . request('sub_kategori') : '' }}</p>
                @auth
                    <a href="/tambah-produk" class="btn header-btn mt-3">Tambah</a>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="services-area pt-100 pb-100">
    <div class="container">
        <form class="mb-5" action="{{ URL::current() }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="cari" value="{{ request('cari') }}" placeholder="Cari produk disini ...">
                <div class="input-group-append">
                    <button type="submit" class="input-group-text">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
        <div class="row justify-content-center">
            @forelse ($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-10 mb-80">
                    <div class="single-services mb-200">
                        @if (count($product->images) > 0)
                            <div class="services-img">
                                <img src="{{ asset(Storage::url($product->images[0]->foto)) }}" alt="">
                            </div>
                        @endif
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
                            @auth
                                <div class="float-right mt-4">
                                    <button data-link="{{ route('produk.edit', $product) }}" class="mx-1 bg-success p-2 rounded border-0 edit" title="Edit Produk">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>

                                    <form class="d-inline-block" action="{{ route('produk.destroy', $product) }}" method="post">
                                        @csrf @method('delete')
                                        <button type="submit" class="mx-1 bg-danger p-2 rounded border-0" onclick="return confirm('Apakah anda yakin ingin menghapus produk {{ $product->nama_produk }} ini ?')" title="Hapus Produk">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <h4 class="text-dark">Data belum tersedia</h4>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        {{ $products->links() }}
    </div>
</div>
<hr class="m-0">
@endsection

@push('scripts')
<script>
    $(".edit").click(function () {
        location.href = $(this).data('link');
    });
</script>
@endpush
