<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
  use Notifiable, HasApiTokens, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  // QUERY //
  public function scopeLogin($query, $request)
  {
    return $query->where(\DB::Raw('LOWER(email)'), strtolower($request->username))->orWhere(\DB::Raw('LOWER(username)'), strtolower($request->username));
  }

  public function findForPassport($username)
  {
    return $this->where('username', strtolower($username))->orWhere('email', strtolower($username))->first();
  }
  // END QUERY //

  // RELATION //
  public function userProfile()
  {
    return $this->hasOne('App\Models\UserProfile', 'user_id', 'id');
  }

  public function employee()
  {
    return $this->hasOne('App\Models\Employee', 'user_id', 'id');
  }

  public function userGroup()
  {
    return $this->hasOne('App\Models\UserGroup', 'user_id', 'id');
  }

  public function userRole()
  {
    return $this->hasOne('App\Models\UserRole', 'user_id', 'id');
  }

  public function userPermission()
  {
    return $this->hasMany('App\Models\UserPermission', 'user_id', 'id');
  }

  public function userAccess()
  {
    return $this->hasMany('App\Models\UserAccess', 'user_id', 'id');
  }

  public function otp()
  {
    return $this->hasOne('App\Models\Otp', 'user_id', 'id');
  }

  public function emailVerification()
  {
    return $this->hasOne('App\Models\EmailVerification', 'user_id', 'id');
  }
  // END RELATION //
}
