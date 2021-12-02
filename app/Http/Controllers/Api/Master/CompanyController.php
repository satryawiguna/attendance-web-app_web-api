<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
  public function companyList()
  {
    $company = Company::all();
    return response()->json(['status' => '200', 'return' => $company], 200);
  }
}
