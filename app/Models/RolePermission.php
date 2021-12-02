<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolePermission extends Model
{
  protected $fillable = [
    'role_id', 'permission_id', 'type', 'value'
  ];

  // QUERY //
  public function scopeUserPermission($query, $user_id)
  {
    return $query->whereHas('role', function ($q) use ($user_id) {
      $q->whereHas('userRole', function ($q) use ($user_id) {
        $q->whereHas('user', function ($q) use ($user_id) {
          $q->where('id', $user_id);
        });
      });
    });
  }
  // END QUERY //

  // RELATION //
  public function role()
  {
    return $this->belongsTo('App\Models\Role', 'role_id', 'id');
  }

  public function permission()
  {
    return $this->belongsTo('App\Models\Permission', 'permission_id', 'id');
  }
  // END RELATION //
}
