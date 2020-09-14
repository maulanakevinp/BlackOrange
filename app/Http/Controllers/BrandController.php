<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('brand', [
            'brands' => Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }

        for ($i = 0; $i < count($photos); $i++) {
            Brand::create([
                'foto'      => $photos[$i]->store('public/brand'),
            ]);
        }

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $brands = Brand::paginate(9);
        return response()->json($brands);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        File::delete(storage_path('app/'.$brand->foto));
        $brand->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gambar berhasil dihapus'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            $brand = Brand::findOrFail($id);
            File::delete(storage_path('app/'.$brand->foto));
            $brand->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Gambar berhasil dihapus'
        ]);
    }
}
