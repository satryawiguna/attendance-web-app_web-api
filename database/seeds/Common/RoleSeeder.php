<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Role::insert([
      [
        'group_id' => 1,
        'name' => 'Super Admin',
        'slug' => 'super-admin',
        'description' => null,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'group_id' => 1,
        'name' => 'Admin',
        'slug' => 'admin',
        'description' => null,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'group_id' => 2,
        'name' => 'Admin',
        'slug' => 'admin',
        'description' => null,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'group_id' => 2,
        'name' => 'Owner',
        'slug' => 'owner',
        'description' => null,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'group_id' => 2,
        'name' => 'Manager',
        'slug' => 'manager',
        'description' => null,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'group_id' => 2,
        'name' => 'Staff',
        'slug' => 'staff',
        'description' => null,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
    ]);
  }
}
