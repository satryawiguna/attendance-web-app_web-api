<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'username' => $this->username,
      'email' => $this->email,
      'status' => $this->status,
      'device_id' => $this->device_id,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
      'user_employee' => new EmployeeResource($this->employee),
      'user_profile' => new UserProfileResource($this->userProfile),
      'user_office' => $this->employee->office
    ];
  }
}
