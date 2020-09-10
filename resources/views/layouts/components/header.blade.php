@php
    $jasa = App\Product::where('produk_atau_jasa', 2)->get();
    $produk = App\Product::where('produk_atau_jasa', 1)->get();
@endphp
<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header header-sticky" style="background-color: #ff1313">
            <div class="container-fluid">
                <div class="menu-wrapper d-flex align-items-center justify-content-between">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="/" class="font-weight-bold text-uppercase">{{ App\Utility::find(1)->nama_website }}</a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu f-right d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="/">Beranda</a></li>
                                <li><a href="/#tentang-kami">Tentang Kami</a></li>
                                <li><a href="#">Jasa & Layanan</a>
                                    @if ($jasa->groupBy('produk')->count() > 0)
                                        <ul class="submenu">
                                            @foreach ($jasa->groupBy('produk') as $productKey => $product)
                                                <li><a href="#">{{ $productKey }}</a>
                                                    @if ($jasa->where('produk', $productKey)->groupBy('kategori')->count() > 1)
                                                        <ul class="sub-submenu">
                                                            @foreach($jasa->where('produk', $productKey)->groupBy('kategori') as $categoryKey => $category)
                                                                @if($categoryKey)
                                                                    <li><a href="#">{{ $categoryKey }}</a>
                                                                        @if ($jasa->where('kategori', $categoryKey)->groupBy('sub_kategori')->count() > 1)
                                                                            <ul class="sub-submenu">
                                                                                @foreach($jasa->where('kategori', $categoryKey)->groupBy('sub_kategori') as $subcategoryKey => $subcategory)
                                                                                    <li><a href="#">{{ $subcategoryKey }}</a></li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                                <li><a href="#">Produk</a>
                                    @if ($produk->groupBy('produk')->count() > 0)
                                        <ul class="submenu">
                                            @foreach ($produk->groupBy('produk') as $productKey => $product)
                                                <li><a href="#">{{ $productKey }}</a>
                                                    @if ($produk->where('produk', $productKey)->groupBy('kategori')->count() > 1)
                                                        <ul class="sub-submenu">
                                                            @foreach($produk->where('produk', $productKey)->groupBy('kategori') as $categoryKey => $category)
                                                                @if($categoryKey)
                                                                    <li><a href="#">{{ $categoryKey }}</a>
                                                                        @if ($produk->where('kategori', $categoryKey)->groupBy('sub_kategori')->count() > 1)
                                                                            <ul class="sub-submenu">
                                                                                @foreach($produk->where('kategori', $categoryKey)->groupBy('sub_kategori') as $subcategoryKey => $subcategory)
                                                                                    <li><a href="#">{{ $subcategoryKey }}</a></li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                                <li><a href="#kontak">Kontak</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header-btn -->
                    {{-- <div class="header-btns d-none d-lg-block f-right">
                        <a href="#" class="btn header-btn">Contact Us</a>
                    </div> --}}
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>