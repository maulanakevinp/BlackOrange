@php
    if (auth()->user()) {
        $layanan = App\Product::where('produk_atau_jasa', 2)->get();
        $barang = App\Product::where('produk_atau_jasa', 1)->get();
    } else {
        $layanan = App\Product::whereHas('images')->where('produk_atau_jasa', 2)->get();
        $barang = App\Product::whereHas('images')->where('produk_atau_jasa', 1)->get();
    }
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
                                <li><a href="/tentang-kami">Tentang Kami</a></li>
                                <li><a href="/gallery">Gallery</a></li>
                                <li><a href="/jasa">Jasa & Layanan</a>
                                    @if ($layanan->groupBy('produk')->count() > 0)
                                        <ul class="submenu">
                                            @foreach ($layanan->groupBy('produk') as $productKey => $product)
                                                <li><a href="/jasa?produk={{ $productKey }}">{{ $productKey }}</a>
                                                    @if ($layanan->where('produk', $productKey)->groupBy('kategori')->count() > 1)
                                                        <ul class="sub-submenu">
                                                            @foreach($layanan->where('produk', $productKey)->groupBy('kategori') as $categoryKey => $category)
                                                                @if($categoryKey!= "")
                                                                    <li><a href="/jasa?produk={{ $productKey }}?kategori={{ $categoryKey }}">{{ $categoryKey }}</a>
                                                                        @if ($layanan->where('produk', $productKey)->where('kategori', $categoryKey)->groupBy('sub_kategori')->count() > 1)
                                                                            <ul class="sub-submenu">
                                                                                @foreach($layanan->where('produk', $productKey)->where('kategori', $categoryKey)->groupBy('sub_kategori') as $subcategoryKey => $subcategory)
                                                                                    @if($subcategoryKey != "")
                                                                                        <li><a href="/jasa?produk={{ $productKey }}&kategori={{ $categoryKey }}&sub_kategori={{ $subcategoryKey }}">{{ $subcategoryKey }}</a></li>
                                                                                    @else
                                                                                        <li class="nothing" style="display: none"></li>
                                                                                    @endif
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @else
                                                                    <li class="nothing"></li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                                <li><a href="/produk">Produk</a>
                                    @if ($barang->groupBy('produk')->count() > 0)
                                        <ul class="submenu">
                                            @foreach ($barang->groupBy('produk') as $productKey => $product)
                                                <li><a href="/produk?produk={{ $productKey }}">{{ $productKey }}</a>
                                                    @if ($barang->where('produk', $productKey)->groupBy('kategori')->count() > 0)
                                                        <ul class="sub-submenu">
                                                            @foreach($barang->where('produk', $productKey)->groupBy('kategori') as $categoryKey => $category)
                                                                @if($categoryKey != "")
                                                                    <li><a href="?produk={{ $productKey }}&kategori={{ $categoryKey }}">{{ $categoryKey }}</a>
                                                                        @if ($barang->where('produk', $productKey)->where('kategori', $categoryKey)->groupBy('sub_kategori')->count() > 0)
                                                                            <ul class="sub-submenu">
                                                                                @foreach($barang->where('produk', $productKey)->where('kategori', $categoryKey)->groupBy('sub_kategori') as $subcategoryKey => $subcategory)
                                                                                    @if($subcategoryKey != "")
                                                                                        <li><a href="?produk={{ $productKey }}&kategori={{ $categoryKey }}&sub_kategori={{ $subcategoryKey }}">{{ $subcategoryKey }}</a></li>
                                                                                    @else
                                                                                        <li class="nothing"></li>
                                                                                    @endif
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @else
                                                                    <li class="nothing"></li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                                <li><a href="/#kontak">Kontak</a></li>
                                @auth
                                    <li><a href="#">Menu</a>
                                        <ul class="submenu">
                                            <li><a href="/produk">Kelola Produk</a></li>
                                            <li><a href="/jasa">Kelola Jasa</a></li>
                                            <li><a href="/brand">Kelola Brand</a></li>
                                            <li><a href="/slideshow">Kelola Slideshow</a></li>
                                            <li><a href="/testimoni">Kelola Testimoni</a></li>
                                            <li><a href="/pengaturan-website">Pengaturan Website</a></li>
                                            <li><a href="/ganti-password">Ganti Password</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="/logout" onclick="event.preventDefault(); document.querySelector('#logout').submit();">Logout</a>
                                        <form id="logout" action="{{ route('keluar') }}" method="post">
                                            @csrf
                                        </form>
                                    </li>
                                @endauth
                            </ul>
                        </nav>
                    </div>
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
