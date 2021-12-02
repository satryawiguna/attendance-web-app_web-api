<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadImage extends Controller
{
  public function uploadImage($image, $url)
  {
    $image = $image;
    $extension = $image->getClientOriginalExtension();
    $filename = rand(111, 99999) . date('Ymdhis') . '.' . $extension;
    $path = $url . $filename;

    Storage::disk('local_storage')->put($path, file_get_contents($image));

    // save image in space
    // $createimg = \Image::make($image)->resize($width, $height, function ($constraint) {
    //   $constraint->aspectRatio();
    // });
    // Storage::disk('aws')->put($path, (string) $createimg->encode(), 'public');
    return $filename;
  }
}
