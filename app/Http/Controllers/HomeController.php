<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\SlideShow;
use App\Testimonial;
use App\Utility;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('beranda', [
            'slideshows'    => SlideShow::all(),
            'utility'       => Utility::find(1),
            'products'      => Product::whereHas('images')->where('produk_atau_jasa', 1)->latest()->take(3)->get(),
            'services'      => Product::whereHas('images')->where('produk_atau_jasa', 2)->latest()->take(3)->get(),
            'testimonials'  => Testimonial::all(),
            'brands'        => Brand::all()
        ]);
    }

    public function tentangKami()
    {
        return view('tentang-kami', ['utility' => Utility::find(1)]);
    }
}
