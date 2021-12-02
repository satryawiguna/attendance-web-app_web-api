<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
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
      'full_name' => $this->full_name,
      'nick_name' => $this->nick_name,
      'photo_profile' => $this->photo_profile ? 'img/photo_profile/' . $this->photo_profile : null,
      'phone' => $this->phone,
      'country' => isset($this['country']) ? $this->country['country_name'] : '',
      'state' => isset($this['state']) ? $this->state['state_name'] : '',
      'city' => isset($this->city['city_name']) ? $this->city['city_name'] : '',
      'address' => $this->address,
      'postcode' => $this->postcode,
      'gender' => $this->gender,
      'religion' => isset($this['religion']) ? $this->religion['religion_name'] : '',
      'birth_date' => $this->birth_date,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
    ];
  }
}
