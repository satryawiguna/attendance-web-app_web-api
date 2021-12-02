<?php

namespace App\Models\Passport;

use Laravel\Passport\Client as OAuthClient;

class Client extends OAuthClient
{
  public $incrementing = false;

  public static function boot()
  {
    parent::boot();
    static::creating(function ($model) {
      $model->id = (string) \Str::uuid();
    });
  }
}
