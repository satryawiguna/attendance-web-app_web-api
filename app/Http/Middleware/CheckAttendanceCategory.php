<?php

namespace App\Http\Middleware;

use App\Models\AbsentCategory;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAttendanceCategory
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
    $attendanceRoute = ['attendance-category-update', 'attendance-category-list', 'attendance-category-create'];
    if (in_array(\Route::currentRouteName(), $attendanceRoute)) {
      return $next($request);
    } else {
      $userRole = Auth::user()->userRole->role_id;
      if ($userRole == 3) {
        $absentCategory = AbsentCategory::where('company_id', Auth::user()->employee->company->id)->where('time_start', null)->first();
        if ($absentCategory) {
          return redirect()->route('attendance-category-list')->with('gagal', 'Lengkapi kategori attendance terlebih dahulu!');
        }
        return $next($request);
      }
      return $next($request);
    }
  }
}
