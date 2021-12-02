<?php

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Position::insert([
      [
        'parent_id' => null,
        'company_id' => 1,
        'name' => 'Staff',
        'slug' => 'staff',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'parent_id' => 1,
        'company_id' => 1,
        'name' => 'Staff IT',
        'slug' => 'staff-it',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'parent_id' => 1,
        'company_id' => 1,
        'name' => 'Staff Developer',
        'slug' => 'staff-developer',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'parent_id' => null,
        'company_id' => 2,
        'name' => 'Staff',
        'slug' => 'staff',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'parent_id' => 4,
        'company_id' => 2,
        'name' => 'Staff Marketing',
        'slug' => 'staff-marketing',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'parent_id' => 4,
        'company_id' => 2,
        'name' => 'Staff Akuntan',
        'slug' => 'staff-akuntan',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'parent_id' => null,
        'company_id' => 3,
        'name' => 'Staff',
        'slug' => 'staff',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'parent_id' => 7,
        'company_id' => 3,
        'name' => 'Staff Marketing',
        'slug' => 'staff-marketing',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'parent_id' => 7,
        'company_id' => 3,
        'name' => 'Staff Analis',
        'slug' => 'staff-analis',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
    ]);
  }
}
