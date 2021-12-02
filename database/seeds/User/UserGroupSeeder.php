<?php

use App\Models\UserGroup;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    UserGroup::insert([
      ['user_id' => 1, 'group_id' => 1],
      ['user_id' => 2, 'group_id' => 1],

      ['user_id' => 3, 'group_id' => 2],
      ['user_id' => 4, 'group_id' => 2],
      ['user_id' => 5, 'group_id' => 2],
      ['user_id' => 6, 'group_id' => 2],

      ['user_id' => 7, 'group_id' => 2],
      ['user_id' => 8, 'group_id' => 2],
      ['user_id' => 9, 'group_id' => 2],
      ['user_id' => 10, 'group_id' => 2],
      ['user_id' => 11, 'group_id' => 2],
      ['user_id' => 12, 'group_id' => 2],
      ['user_id' => 13, 'group_id' => 2],
      ['user_id' => 14, 'group_id' => 2],
      ['user_id' => 15, 'group_id' => 2],
      ['user_id' => 16, 'group_id' => 2],
      ['user_id' => 17, 'group_id' => 2],
      ['user_id' => 18, 'group_id' => 2],
      ['user_id' => 19, 'group_id' => 2],
      ['user_id' => 20, 'group_id' => 2],
      ['user_id' => 21, 'group_id' => 2],
    ]);
  }
}
