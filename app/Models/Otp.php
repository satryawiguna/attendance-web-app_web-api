<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
  protected $fillable = [
    'user_id', 'otp', 'created_at'
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id', 'id');
  }
}
