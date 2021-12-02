<?php

namespace App\Http\Controllers\Web\Common;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
  public function countryList()
  {
    $country = Country::all();
    return view('dashboard.pages.common.country.country_list', compact('country'));
  }

  public function countryCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'two_letter_code' => 'required|min:2|max:2'
      ]);

      $country = new Country();
      $country->country_name = $request->country_name;
      $country->two_letter_code = $request->two_letter_code;
      $country->phone_code = $request->phone_code;
      $country->save();

      return redirect()->back()->with('sukses', 'Create Country Success!');
    }
  }

  public function countryEdit(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required|exists:countries'
      ]);

      $country = Country::where('id', $request->id)->first();
      $country->country_name = $request->country_name;
      $country->two_letter_code = $request->two_letter_code;
      $country->phone_code = $request->phone_code;
      $country->save();

      return redirect()->back()->with('sukses', 'Update Country Success!');
    }
  }

  public function countryDelete($id = null)
  {
    Country::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete Country Success!');
  }
}
