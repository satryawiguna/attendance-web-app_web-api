<?php

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Feature::insert([
      [
        'feature_name' => 'Geolocation',
        'description' => 'Absent validation using geolocation',
        'unit_status' => 'meter',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'feature_name' => 'Body Temperature',
        'description' => 'Absent validation using body temperature',
        'unit_status' => 'celcius',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
    ]);
  }
}
