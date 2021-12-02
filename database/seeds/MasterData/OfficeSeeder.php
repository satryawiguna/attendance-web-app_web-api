<?php

use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Office::insert([
      [
        'company_id' => 1,
        'name' => 'Perusahaan Baju Cabang Denpasar',
        'slug' => 'perusahaan-baju-cabang-denpasar',
        'longitude' => '115.091949',
        'latitude' => '115.091949',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'company_id' => 1,
        'name' => 'Perusahaan Baju Cabang Singaraja',
        'slug' => 'perusahaan-baju-cabang-singaraja',
        'longitude' => '115.091949',
        'latitude' => '115.091949',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'company_id' => 2,
        'name' => 'Perusahaan Sembako Cabang Badung',
        'slug' => 'perusahaan-sembako-cabang-badung',
        'longitude' => '115.091949',
        'latitude' => '115.091949',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'company_id' => 2,
        'name' => 'Perusahaan Sembako Cabang Tabanan',
        'slug' => 'perusahaan-sembako-cabang-tabanan',
        'longitude' => '115.091949',
        'latitude' => '115.091949',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'company_id' => 3,
        'name' => 'Perusahaan Elektronik Cabang Karangasem',
        'slug' => 'perusahaan-elektronik-cabang-karangasem',
        'longitude' => '115.091949',
        'latitude' => '115.091949',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'company_id' => 3,
        'name' => 'Perusahaan Elektronik Cabang Bangli',
        'slug' => 'perusahaan-elektronik-cabang-bangli',
        'longitude' => '115.091949',
        'latitude' => '115.091949',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
    ]);
  }
}
