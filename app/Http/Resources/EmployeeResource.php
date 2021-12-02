<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
      'company' => $this->company->name,
      'work_unit' => $this->workUnit ? $this->workUnit->name : null,
      'position' => $this->position ? $this->position->name : null,
      'nip' => $this->nip,
      'full_name' => $this->full_name,
      'gender' => $this->gender,
      'religion' => $this->religion ? $this->religion->religion_name : null,
      'email' => $this->email,
      'phone' => $this->phone,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
    ];
  }
}
