<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
  public function cityList()
  {
    $city = City::all();
    return response()->json(['status' => '200', 'return' => $city], 200);
  }
}
