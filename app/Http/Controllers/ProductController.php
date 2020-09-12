<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produk.index', [
            'products'  => Product::where('produk_atau_jasa',1)->orderBy('id', 'desc')->paginate(12)
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexJasa()
    {
        return view('jasa.index', [
            'products'  => Product::where('produk_atau_jasa',2)->orderBy('id', 'desc')->paginate(12)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
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
            'kategori'          =>  ['nullable','string','max:64'],
            'sub_kategori'      =>  ['nullable','string','max:64'],
            'harga'             =>  ['required','numeric','min:1000'],
            'deskripsi'         =>  ['required'],
            'bukalapak'         =>  ['nullable'],
            'tokopedia'         =>  ['nullable'],
            'shopee'            =>  ['nullable'],
            'olx'               =>  ['nullable'],
        ]);

        $produk = Product::create($data);
        return redirect()->route('produk.edit', $produk)->with('success', 'Produk berhasil ditambahkan');
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
        return view('produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $produk)
    {
        $data = $request->validate([
            'produk_atau_jasa'  =>  ['required'],
            'nama_produk'       =>  ['required','string','max:168'],
            'produk'            =>  ['required','string','max:64'],
            'kategori'          =>  ['nullable','string','max:64'],
            'sub_kategori'      =>  ['nullable','string','max:64'],
            'harga'             =>  ['required','numeric','min:1000'],
            'deskripsi'         =>  ['required'],
            'bukalapak'         =>  ['nullable'],
            'tokopedia'         =>  ['nullable'],
            'shopee'            =>  ['nullable'],
            'olx'               =>  ['nullable'],
        ]);

        $produk->update($data);
        return redirect()->back()->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $produk)
    {
        foreach ($produk->images as $image) {
            File::delete(storage_path('app/'.$image->foto));
            $image->delete();
        }

        $produk->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }
}
