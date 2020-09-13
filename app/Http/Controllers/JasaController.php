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
    public function index()
    {
        if (auth()->user()) {
            $products = Product::where('produk_atau_jasa',2)->orderBy('id', 'desc')->paginate(15);
        } else {
            $products = Product::whereHas('images')->where('produk_atau_jasa',2)->orderBy('id', 'desc')->paginate(15);
        }

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
            'kategori'          =>  ['nullable','string','max:64'],
            'sub_kategori'      =>  ['nullable','string','max:64'],
            'harga'             =>  ['required','numeric','min:1000'],
            'deskripsi'         =>  ['required'],
            'bukalapak'         =>  ['nullable'],
            'tokopedia'         =>  ['nullable'],
            'shopee'            =>  ['nullable'],
            'olx'               =>  ['nullable'],
        ]);

        $jasa = Product::create($data);
        return redirect()->route('jasa.edit', $jasa)->with('success', 'Jasa & Layanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $jasa
     * @return \Illuminate\Http\Response
     */
    public function show(Product $jasa, $slug)
    {
        if (Str::slug($jasa->nama_produk) != $slug) {
            return abort(404);
        }
        return view('jasa.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $jasa
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $jasa)
    {
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
            'kategori'          =>  ['nullable','string','max:64'],
            'sub_kategori'      =>  ['nullable','string','max:64'],
            'harga'             =>  ['required','numeric','min:1000'],
            'deskripsi'         =>  ['required'],
            'bukalapak'         =>  ['nullable'],
            'tokopedia'         =>  ['nullable'],
            'shopee'            =>  ['nullable'],
            'olx'               =>  ['nullable'],
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
