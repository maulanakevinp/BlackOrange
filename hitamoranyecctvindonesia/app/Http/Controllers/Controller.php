<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setImageUpload($file, $path, $old_file = null)
    {
        $file_name = Str::random(32) . "." . $file->getClientOriginalExtension();
        if ($file->move(public_path('storage/'.$path), $file_name)) {
            if ($old_file) {
                File::delete(public_path(str_replace('public','storage',$old_file)));
            }
            return 'public/' . $path . $file_name;
        } else {
            return back();
        }
    }
}
