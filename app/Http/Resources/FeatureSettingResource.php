<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeatureSettingResource extends JsonResource
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
      'feature_name' => $this->feature->feature_name,
      'satuan' => $this->feature->unit_status,
      'min_value' => $this->min_value,
      'max_value' => $this->max_value,
      'active_status' => $this->getActiveStatus(),
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
    ];
  }
}
