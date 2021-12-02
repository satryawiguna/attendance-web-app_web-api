<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserCompany
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    $company_id = isset(Auth::user()['employee']['company_id']);
    if (!$company_id) {
      return redirect()->back()->with('gagal', 'You are not registered from any company yet!');
    }

    return $next($request);
  }
}
