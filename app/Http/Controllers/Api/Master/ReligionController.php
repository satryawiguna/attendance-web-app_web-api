<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Models\Religion;
use Illuminate\Http\Request;

class ReligionController extends Controller
{
  public function religionList()
  {
    $religion = Religion::all();
    return response()->json(['status' => '200', 'return' => $religion], 200);
  }
}
