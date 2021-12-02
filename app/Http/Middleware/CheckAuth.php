<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CheckAuth
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
    if (Auth::check() && Auth::user()->userRole) {

      $route = Route::currentRouteName();
      $permission = Permission::checkPermission($route)->where('route_type', 'web')->first();

      if (!$permission) {
        return redirect()->back()->with('gagal', 'You Can not Access the Page!');
      }

      return $next($request);
    } else {
      Auth::guard('web')->logout();
      return redirect()->route('login');
    }
  }
}
