<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()) {
            $products = Product::where('produk_atau_jasa',2)->latest()->paginate(9);

            if ($request->jasa) {
                if ($request->kategori) {
                    if ($request->sub_kategori) {
                        $products = Product::where('produk_atau_jasa',2)->where('produk', $request->jasa)->where('kategori', $request->kategori)->where('sub_kategori', $request->sub_kategori)->latest()->paginate(9);
                    } else {
                        $products = Product::where('produk_atau_jasa',2)->where('produk', $request->jasa)->where('kategori', $request->kategori)->latest()->paginate(9);
                    }
                } else {
                    $products = Product::where('produk_atau_jasa',2)->where('produk', $request->jasa)->latest()->paginate(9);
                }
            }

            if ($request->cari) {
                $products = Product::where('produk_atau_jasa',2)->where(function($produk) use ($request){
                    $produk->where('nama_produk','like', "%$request->cari%");
                    $produk->orWhere('produk','like', "%$request->cari%");
                    $produk->orWhere('kategori','like', "%$request->cari%");
                    $produk->orWhere('sub_kategori','like', "%$request->cari%");
                })->latest()->paginate(9);
            }

        } else {
            $products = Product::whereHas('images')->where('produk_atau_jasa',2)->latest()->paginate(9);

            if ($request->produk) {
                if ($request->kategori) {
                    if ($request->sub_kategori) {
                        $products = Product::whereHas('images')->where('produk_atau_jasa',2)->where('produk', $request->produk)->where('kategori', $request->kategori)->where('sub_kategori', $request->sub_kategori)->latest()->paginate(9);
                    } else {
                        $products = Product::whereHas('images')->where('produk_atau_jasa',2)->where('produk', $request->produk)->where('kategori', $request->kategori)->latest()->paginate(9);
                    }
                } else {
                    $products = Product::whereHas('images')->where('produk_atau_jasa',2)->where('produk', $request->produk)->latest()->paginate(9);
                }
            }

            if ($request->cari) {
                $products = Product::whereHas('images')->where('produk_atau_jasa',2)->where(function($produk) use ($request){
                    $produk->where('nama_produk','like', "%$request->cari%");
                    $produk->orWhere('produk','like', "%$request->cari%");
                    $produk->orWhere('kategori','like', "%$request->cari%");
                    $produk->orWhere('sub_kategori','like', "%$request->cari%");
                })->latest()->paginate(9);
            }
        }

        $products->appends(request()->input())->links();

        return view('jasa.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'produk_atau_jasa'  =>  ['required'],
            'nama_produk'       =>  ['required','string','max:168'],
            'produk'            =>  ['required','string','max:64'],
            'kategori'          =>  ['nullable','string','max:64','required_with:sub_kategori'],
            'sub_kategori'      =>  ['nullable','string','max:64'],
            'deskripsi'         =>  ['required'],
            'bukalapak'         =>  ['nullable','url'],
            'tokopedia'         =>  ['nullable','url'],
            'shopee'            =>  ['nullable','url'],
            'olx'               =>  ['nullable','url'],
        ]);

        $produk = Product::create($data);
        return redirect()->route('jasa.edit', $produk)->with('success', 'Jasa & Layanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Product $produk, $slug)
    {
        if (Str::slug($produk->nama_produk) != $slug) {
            return abort(404);
        }

        if ($produk->produk_atau_jasa != 2) {
            return abort(404);
        }

        if (count($produk->images) == 0) {
            return abort(404);
        }

        return view('jasa.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $produk)
    {
        if ($produk->produk_atau_jasa != 2) {
            return abort(404);
        }

        return view('jasa.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $jasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $jasa)
    {
        $data = $request->validate([
            'produk_atau_jasa'  =>  ['required'],
            'nama_produk'       =>  ['required','string','max:168'],
            'produk'            =>  ['required','string','max:64'],
            'kategori'          =>  ['nullable','string','max:64','required_with:sub_kategori'],
            'sub_kategori'      =>  ['nullable','string','max:64'],
            'deskripsi'         =>  ['required'],
            'bukalapak'         =>  ['nullable','url'],
            'tokopedia'         =>  ['nullable','url'],
            'shopee'            =>  ['nullable','url'],
            'olx'               =>  ['nullable','url'],
        ]);

        $jasa->update($data);
        return redirect()->back()->with('success', 'Jasa & Layanan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $jasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $jasa)
    {
        foreach ($jasa->images as $image) {
            File::delete(storage_path('app/'.$image->foto));
            $image->delete();
        }

        $jasa->delete();
        return redirect()->back()->with('success', 'Jasa & Layanan berhasil dihapus');
    }
}
