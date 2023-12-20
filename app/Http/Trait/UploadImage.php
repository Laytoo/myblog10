<?php

namespace App\Http\Trait;

use \Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait UploadImage
{
    public function upload($file)
    {
        $filename = Str::uuid() . $file->getClientOriginalName();
        $file->move(public_path('assets/images'), $filename);
        $path = 'assets/images/' . $filename;
        return $path;
    }

    // public function updateImage(Request $request,$inputName,$path,$oldpath=null)
    // {

    //     if($request->hasFile($inputName))
    //     {
    //         if(File::exists(public_path($oldpath))){
    //             File::delete(public_path($oldpath));
    //         }

    //         $image=$request->{$inputName};
    //         $ext=$image->getClientOriginalExtension();
    //         $imageName='media_'.uniqid().'.'.$ext;
    //         $image->move(public_path($path),$imageName);
    //         return $path.'/'.$imageName;

    //     }
    // }
}
