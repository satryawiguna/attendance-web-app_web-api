<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
  public function stateList()
  {
    $state = State::all();
    return response()->json(['status' => '200', 'return' => $state], 200);
  }
}
