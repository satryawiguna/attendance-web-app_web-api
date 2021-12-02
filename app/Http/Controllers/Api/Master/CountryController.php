<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
  public function countryList()
  {
    $country = Country::all();
    return response()->json(['status' => '200', 'return' => $country], 200);
  }
}
