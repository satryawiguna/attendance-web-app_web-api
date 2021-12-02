<?php

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Group::insert([
      [
        'name' => 'System',
        'slug' => 'system',
        'description' => null,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Company',
        'slug' => 'company',
        'description' => null,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
    ]);
  }
}
