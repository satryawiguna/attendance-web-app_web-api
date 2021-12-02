<?php

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    UserRole::insert([
      ['user_id' => 1, 'role_id' => 1],
      ['user_id' => 2, 'role_id' => 2],

      ['user_id' => 3, 'role_id' => 3],
      ['user_id' => 4, 'role_id' => 4],
      ['user_id' => 5, 'role_id' => 5],
      ['user_id' => 6, 'role_id' => 6],

      ['user_id' => 7, 'role_id' => 3],
      ['user_id' => 8, 'role_id' => 6],
      ['user_id' => 9, 'role_id' => 6],
      ['user_id' => 10, 'role_id' => 6],
      ['user_id' => 11, 'role_id' => 6],
      ['user_id' => 12, 'role_id' => 3],
      ['user_id' => 13, 'role_id' => 6],
      ['user_id' => 14, 'role_id' => 6],
      ['user_id' => 15, 'role_id' => 6],
      ['user_id' => 16, 'role_id' => 6],
      ['user_id' => 17, 'role_id' => 3],
      ['user_id' => 18, 'role_id' => 6],
      ['user_id' => 19, 'role_id' => 6],
      ['user_id' => 20, 'role_id' => 6],
      ['user_id' => 21, 'role_id' => 6],
    ]);
  }
}
