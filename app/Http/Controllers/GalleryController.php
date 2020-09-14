<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gallery.index');
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
            Gallery::create([
                'foto'      => $photos[$i]->store('public/gallery'),
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
        $galleries = Gallery::paginate(9);
        return response()->json($galleries);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('gallery.kelola-gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        File::delete(storage_path('app/'.$gallery->foto));
        $gallery->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gambar berhasil dihapus'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            $gallery = Gallery::findOrFail($id);
            File::delete(storage_path('app/'.$gallery->foto));
            $gallery->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Gambar berhasil dihapus'
        ]);
    }
}
