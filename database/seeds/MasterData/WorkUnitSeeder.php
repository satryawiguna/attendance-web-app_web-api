<?php

use App\Models\WorkUnit;
use Illuminate\Database\Seeder;

class WorkUnitSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    WorkUnit::insert([
      [
        'parent_id' => null,
        'company_id' => 1,
        'name' => 'Development',
        'slug' => 'development',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'parent_id' => 1,
        'company_id' => 1,
        'name' => 'Development Java',
        'slug' => 'development-java',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'parent_id' => 1,
        'company_id' => 1,
        'name' => 'Development Ruby',
        'slug' => 'development-ruby',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'parent_id' => null,
        'company_id' => 2,
        'name' => 'Development',
        'slug' => 'development-javascript',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'parent_id' => 4,
        'company_id' => 2,
        'name' => 'Development Python',
        'slug' => 'development-python',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'parent_id' => 4,
        'company_id' => 2,
        'name' => 'Development PHP',
        'slug' => 'development-php',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'parent_id' => null,
        'company_id' => 3,
        'name' => 'Development',
        'slug' => 'development',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'parent_id' => 7,
        'company_id' => 3,
        'name' => 'Development C#',
        'slug' => 'development-c#',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'parent_id' => 7,
        'company_id' => 3,
        'name' => 'Development Dart',
        'slug' => 'development-dart',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
    ]);
  }
}
