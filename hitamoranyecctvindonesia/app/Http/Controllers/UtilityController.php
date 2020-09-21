<?php

namespace App\Http\Controllers;

use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UtilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengaturan-web', [
            'utility'   => Utility::find(1)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Utility  $utility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $utility = Utility::find(1);
        $data = $request->validate([
            'nama_website'              => ['required','string','max:32'],
            'logo'                      => ['nullable','image','max:2048'],
            'nama_perusahaan'           => ['required','string','max:128'],
            'alamat_perusahaan'         => ['required','string'],
            'nomor_telepon'             => ['required','string','max:16'],
            'nomor_whatsapp'            => ['required','string','max:16'],
            'email'                     => ['required','email','max:32'],
            'maps'                      => ['nullable'],
            'link_facebook'             => ['nullable','url'],
            'link_instagram'            => ['nullable','url'],
            'link_twitter'              => ['nullable','url'],
            'link_youtube'              => ['nullable','url'],
            'slogan'                    => ['required','string','max:64'],
            'kalimat_penarik_pelanggan' => ['required','string','max:168'],
            'tentang_kami'              => ['required'],
            'visi'                      => ['required'],
            'misi'                      => ['required'],
        ]);

        if ($request->logo) {
            if ($utility->logo != "public/logo.png") {
                File::delete(public_path(str_replace('public','storage',$utility->logo)));
            }
            $data['logo']   = $this->setImageUpload($request->logo,'public/logo');
        } else {
            $data['logo'] = $utility->logo;
        }

        $utility->update($data);
        return redirect()->back()->with('success', 'Pengaturan Website berhasil diperbarui');
    }
}
