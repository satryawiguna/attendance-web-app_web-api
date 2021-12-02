<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HandleToken extends Controller
{
  public function revokeToken($user)
  {
    // revoke older tokens
    foreach ($user->tokens as $tokenAv) {
      $tokenAv->revoke();
    }
  }

  public function deleteToken()
  {
    //delete older tokens
    $latestToken = \DB::table('oauth_access_tokens')->latest()->first()->id;
    \DB::table('oauth_access_tokens')->where('id', '!=', $latestToken)->delete();
  }
}
