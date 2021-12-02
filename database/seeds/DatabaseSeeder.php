<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call(UserSeeder::class);
    $this->call(UserGroupSeeder::class);
    $this->call(UserRoleSeeder::class);
    $this->call(GroupSeeder::class);
    $this->call(RoleSeeder::class);
    $this->call(CountrySeeder::class);
    $this->call(StateSeeder::class);
    $this->call(CitySeeder::class);
    $this->call(CompanySeeder::class);
    $this->call(OfficeSeeder::class);
    $this->call(PositionSeeder::class);
    $this->call(WorkUnitSeeder::class);
    $this->call(EmployeeSeeder::class);
    $this->call(ReligionSeeder::class);
    $this->call(UserProfileSeeder::class);
    $this->call(PermissionSeeder::class);
    $this->call(RolePermissionSeeder::class);
    $this->call(FeatureSeeder::class);
  }
}
