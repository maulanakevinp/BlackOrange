<?php

namespace App\Http\Controllers;

use App\SlideShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('slideshow');
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
            SlideShow::create([
                'foto'      => $photos[$i]->store('public/slide-show'),
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
        $slideshows = SlideShow::paginate(9);
        return response()->json($slideshows);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SlideShow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slideshow = SlideShow::findOrFail($id);
        File::delete(storage_path('app/'.$slideshow->foto));
        $slideshow->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gambar berhasil dihapus'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SlideShow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            $slideshow = SlideShow::findOrFail($id);
            File::delete(storage_path('app/'.$slideshow->foto));
            $slideshow->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Gambar berhasil dihapus'
        ]);
    }
}
