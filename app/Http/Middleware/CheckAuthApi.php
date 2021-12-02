<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CheckAuthApi
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
    if (Auth::user()->userRole) {

      $route = Route::currentRouteName();
      $permission = Permission::checkPermission($route)->where('route_type', 'api')->first();

      if (!$permission) {
        return response()->json(['status' => '403', 'message' => 'You Can not Access the Page!'], 403);
      }

      return $next($request);
    } else {
      return response()->json(['status' => '403', 'message' => 'You are not registered from any specified role!'], 401);
    }
  }
}
