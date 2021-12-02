<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Permission::insert([
      [
        'name' => 'Home Page',
        'slug' => 'home-page',
        'route' => 'home',
        'route_type' => 'web',
        'url' => '/',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Country List',
        'slug' => 'country-list',
        'route' => 'common-country-list',
        'route_type' => 'web',
        'url' => '/common/country/list',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Country Create',
        'slug' => 'country-create',
        'route' => 'common-country-create',
        'route_type' => 'web',
        'url' => '/common/country/create',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Country update',
        'slug' => 'country-update',
        'route' => 'common-country-update',
        'route_type' => 'web',
        'url' => '/common/country/update',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Country delete',
        'slug' => 'country-delete',
        'route' => 'common-country-delete',
        'route_type' => 'web',
        'url' => '/common/country/delete',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'state List',
        'slug' => 'state-list',
        'route' => 'common-state-list',
        'route_type' => 'web',
        'url' => '/common/state/list',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'state Create',
        'slug' => 'state-create',
        'route' => 'common-state-create',
        'route_type' => 'web',
        'url' => '/common/state/create',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'state update',
        'slug' => 'state-update',
        'route' => 'common-state-update',
        'route_type' => 'web',
        'url' => '/common/state/update',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'state delete',
        'slug' => 'state-delete',
        'route' => 'common-state-delete',
        'route_type' => 'web',
        'url' => '/common/state/delete',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'city List',
        'slug' => 'city-list',
        'route' => 'common-city-list',
        'route_type' => 'web',
        'url' => '/common/city/list',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'city Create',
        'slug' => 'city-create',
        'route' => 'common-city-create',
        'route_type' => 'web',
        'url' => '/common/city/create',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'city update',
        'slug' => 'city-update',
        'route' => 'common-city-update',
        'route_type' => 'web',
        'url' => '/common/city/update',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'city delete',
        'slug' => 'city-delete',
        'route' => 'common-city-delete',
        'route_type' => 'web',
        'url' => '/common/city/delete',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'feature List',
        'slug' => 'feature-list',
        'route' => 'common-feature-list',
        'route_type' => 'web',
        'url' => '/common/feature/list',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'feature Create',
        'slug' => 'feature-create',
        'route' => 'common-feature-create',
        'route_type' => 'web',
        'url' => '/common/feature/create',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'feature update',
        'slug' => 'feature-update',
        'route' => 'common-feature-update',
        'route_type' => 'web',
        'url' => '/common/feature/update',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'feature delete',
        'slug' => 'feature-delete',
        'route' => 'common-feature-delete',
        'route_type' => 'web',
        'url' => '/common/feature/delete',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'religion List',
        'slug' => 'religion-list',
        'route' => 'common-religion-list',
        'route_type' => 'web',
        'url' => '/common/religion/list',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'religion Create',
        'slug' => 'religion-create',
        'route' => 'common-religion-create',
        'route_type' => 'web',
        'url' => '/common/religion/create',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'religion update',
        'slug' => 'religion-update',
        'route' => 'common-religion-update',
        'route_type' => 'web',
        'url' => '/common/religion/update',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'religion delete',
        'slug' => 'religion-delete',
        'route' => 'common-religion-delete',
        'route_type' => 'web',
        'url' => '/common/religion/delete',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'role List',
        'slug' => 'role-list',
        'route' => 'common-role-list',
        'route_type' => 'web',
        'url' => '/common/role/list',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'role Create',
        'slug' => 'role-create',
        'route' => 'common-role-create',
        'route_type' => 'web',
        'url' => '/common/role/create',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'role update',
        'slug' => 'role-update',
        'route' => 'common-role-update',
        'route_type' => 'web',
        'url' => '/common/role/update',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'role delete',
        'slug' => 'role-delete',
        'route' => 'common-role-delete',
        'route_type' => 'web',
        'url' => '/common/role/delete',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'group List',
        'slug' => 'group-list',
        'route' => 'common-group-list',
        'route_type' => 'web',
        'url' => '/common/group/list',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'group Create',
        'slug' => 'group-create',
        'route' => 'common-group-create',
        'route_type' => 'web',
        'url' => '/common/group/create',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'group update',
        'slug' => 'group-update',
        'route' => 'common-group-update',
        'route_type' => 'web',
        'url' => '/common/group/update',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'group delete',
        'slug' => 'group-delete',
        'route' => 'common-group-delete',
        'route_type' => 'web',
        'url' => '/common/group/delete',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'permission List',
        'slug' => 'permission-list',
        'route' => 'common-permission-list',
        'route_type' => 'web',
        'url' => '/common/permission/list',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'permission Create',
        'slug' => 'permission-create',
        'route' => 'common-permission-create',
        'route_type' => 'web',
        'url' => '/common/permission/create',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'permission update',
        'slug' => 'permission-update',
        'route' => 'common-permission-update',
        'route_type' => 'web',
        'url' => '/common/permission/update',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'permission delete',
        'slug' => 'permission-delete',
        'route' => 'common-permission-delete',
        'route_type' => 'web',
        'url' => '/common/permission/delete',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'access List',
        'slug' => 'access-list',
        'route' => 'common-access-list',
        'route_type' => 'web',
        'url' => '/common/access/list',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'access Create',
        'slug' => 'access-create',
        'route' => 'common-access-create',
        'route_type' => 'web',
        'url' => '/common/access/create',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'access update',
        'slug' => 'access-update',
        'route' => 'common-access-update',
        'route_type' => 'web',
        'url' => '/common/access/update',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'access delete',
        'slug' => 'access-delete',
        'route' => 'common-access-delete',
        'route_type' => 'web',
        'url' => '/common/access/delete',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'office List',
        'slug' => 'office-list',
        'route' => 'master-office-list',
        'route_type' => 'web',
        'url' => '/master/office/list',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'office Create',
        'slug' => 'office-create',
        'route' => 'master-office-create',
        'route_type' => 'web',
        'url' => '/master/office/create',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'office update',
        'slug' => 'office-update',
        'route' => 'master-office-update',
        'route_type' => 'web',
        'url' => '/master/office/update',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'office delete',
        'slug' => 'office-delete',
        'route' => 'master-office-delete',
        'route_type' => 'web',
        'url' => '/master/office/delete',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'work unit List',
        'slug' => 'work-unit-list',
        'route' => 'master-work-unit-list',
        'route_type' => 'web',
        'url' => '/master/work-unit/list',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'work unit Create',
        'slug' => 'work-unit-create',
        'route' => 'master-work-unit-create',
        'route_type' => 'web',
        'url' => '/master/work-unit/create',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'work unit update',
        'slug' => 'work-unit-update',
        'route' => 'master-work-unit-update',
        'route_type' => 'web',
        'url' => '/master/work-unit/update',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'work unit delete',
        'slug' => 'work-unit-delete',
        'route' => 'master-work-unit-delete',
        'route_type' => 'web',
        'url' => '/master/work-unit/delete',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'position List',
        'slug' => 'position-list',
        'route' => 'master-position-list',
        'route_type' => 'web',
        'url' => '/master/position/list',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'position Create',
        'slug' => 'position-create',
        'route' => 'master-position-create',
        'route_type' => 'web',
        'url' => '/master/position/create',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'position update',
        'slug' => 'position-update',
        'route' => 'master-position-update',
        'route_type' => 'web',
        'url' => '/master/position/update',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'position delete',
        'slug' => 'position-delete',
        'route' => 'master-position-delete',
        'route_type' => 'web',
        'url' => '/master/position/delete',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Role Permission List',
        'slug' => 'role-permission-list',
        'route' => 'role-permission-list',
        'route_type' => 'web',
        'url' => '/role-permission/list',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Role Permission Update',
        'slug' => 'role-permission-update',
        'route' => 'role-permission-update',
        'route_type' => 'web',
        'url' => '/role-permission/update/{role_id}',
        'is_restricted' => 1,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'User Profile',
        'slug' => 'user-profile',
        'route' => 'profile',
        'route_type' => 'api',
        'url' => '/profile',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Logout',
        'slug' => 'logout',
        'route' => 'logout',
        'route_type' => 'api',
        'url' => '/home',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'User Permission List',
        'slug' => 'user-permission-list',
        'route' => 'user-permission-list',
        'route_type' => 'web',
        'url' => '/user-permission/list',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'User Permission Update',
        'slug' => 'user-permission-update',
        'route' => 'user-permission-update',
        'route_type' => 'web',
        'url' => '/user-permission/update',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Employee List',
        'slug' => 'employee-list',
        'route' => 'employee-list',
        'route_type' => 'web',
        'url' => '/employee/list',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Employee Create',
        'slug' => 'employee-create',
        'route' => 'employee-create',
        'route_type' => 'web',
        'url' => '/employee/create',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Employee Update',
        'slug' => 'employee-update',
        'route' => 'employee-update',
        'route_type' => 'web',
        'url' => '/employee/update',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Employee Delete',
        'slug' => 'employee-delete',
        'route' => 'employee-delete',
        'route_type' => 'web',
        'url' => '/employee/delete',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'User Profile Update',
        'slug' => 'user-profile-update',
        'route' => 'profile-update',
        'route_type' => 'api',
        'url' => '/profile/update',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Device Id Update',
        'slug' => 'device-id-update',
        'route' => 'device-id-update',
        'route_type' => 'api',
        'url' => '/device-id-update',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Company List',
        'slug' => 'company-list',
        'route' => 'company-list',
        'route_type' => 'api',
        'url' => '/company-list',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Get Permission Role (Ajax)',
        'slug' => 'get-permission-role',
        'route' => 'common-role-get-permission',
        'route_type' => 'web',
        'url' => '/common/role/get-permission',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Get Role (Ajax)',
        'slug' => 'get-role',
        'route' => 'common-permission-get-role',
        'route_type' => 'web',
        'url' => '/common/permission/get-role',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Get Permission Access (Ajax)',
        'slug' => 'get-permission-access',
        'route' => 'common-access-get-permission',
        'route_type' => 'web',
        'url' => '/common/access/get-permission',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Setting User Profile',
        'slug' => 'setting-user-profile',
        'route' => 'setting-user-profile',
        'route_type' => 'web',
        'url' => '/setting/user-profile',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Setting Update Profile',
        'slug' => 'setting-update-profile',
        'route' => 'setting-update-profile',
        'route_type' => 'web',
        'url' => '/setting/update-profile',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Setting Feature',
        'slug' => 'setting-feature',
        'route' => 'setting-feature',
        'route_type' => 'web',
        'url' => '/setting/feature',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Project List',
        'slug' => 'project-list',
        'route' => 'project-list',
        'route_type' => 'web',
        'url' => '/project/list',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Project Create',
        'slug' => 'project-create',
        'route' => 'project-create',
        'route_type' => 'web',
        'url' => '/project/create',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Project Update',
        'slug' => 'project-update',
        'route' => 'project-update',
        'route_type' => 'web',
        'url' => '/project/update',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Project Delete',
        'slug' => 'project-delete',
        'route' => 'project-delete',
        'route_type' => 'web',
        'url' => '/project/delete',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Project Mutation List',
        'slug' => 'project-mutation-list',
        'route' => 'project-mutation-list',
        'route_type' => 'web',
        'url' => '/project/mutation/list',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Project Mutation Update',
        'slug' => 'project-mutation-update',
        'route' => 'project-mutation-update',
        'route_type' => 'web',
        'url' => '/project/mutation/update',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Project Work Unit List',
        'slug' => 'project-work-unit-list',
        'route' => 'project-work-unit-list',
        'route_type' => 'web',
        'url' => '/project/work-unit/list',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Project Work Unit Update',
        'slug' => 'project-work-unit-update',
        'route' => 'project-work-unit-update',
        'route_type' => 'web',
        'url' => '/project/work-unit/update',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Project Addendum List',
        'slug' => 'project-addendum-list',
        'route' => 'project-addendum-list',
        'route_type' => 'web',
        'url' => '/project/addendum/list',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Project Addendum Create',
        'slug' => 'project-addendum-create',
        'route' => 'project-addendum-create',
        'route_type' => 'web',
        'url' => '/project/addendum/create',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Project Addendum Update',
        'slug' => 'project-addendum-update',
        'route' => 'project-addendum-update',
        'route_type' => 'web',
        'url' => '/project/addendum/update',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Project Addendum Delete',
        'slug' => 'project-addendum-delete',
        'route' => 'project-addendum-delete',
        'route_type' => 'web',
        'url' => '/project/addendum/delete',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'work area List',
        'slug' => 'work-area-list',
        'route' => 'master-work-area-list',
        'route_type' => 'web',
        'url' => '/master/work-area/list',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'work area Create',
        'slug' => 'work-area-create',
        'route' => 'master-work-area-create',
        'route_type' => 'web',
        'url' => '/master/work-area/create',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'work area update',
        'slug' => 'work-area-update',
        'route' => 'master-work-area-update',
        'route_type' => 'web',
        'url' => '/master/work-area/update',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'work area delete',
        'slug' => 'work-area-delete',
        'route' => 'master-work-area-delete',
        'route_type' => 'web',
        'url' => '/master/work-area/delete',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'work area get state (Ajax)',
        'slug' => 'work-area-get-state',
        'route' => 'master-work-area-get-state',
        'route_type' => 'web',
        'url' => '/master/work-area/get-state',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'work area get city (Ajax)',
        'slug' => 'work-area-get-city',
        'route' => 'master-work-area-get-city',
        'route_type' => 'web',
        'url' => '/master/work-area/get-city',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'master work area list (Ajax)',
        'slug' => 'master-work-area-list-ajax',
        'route' => 'master-work-area-list-ajax',
        'route_type' => 'web',
        'url' => '/master/work-area/list',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'employee search',
        'slug' => 'employee-search',
        'route' => 'employee-search',
        'route_type' => 'web',
        'url' => '/employee/search',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Project Mutation Update Item',
        'slug' => 'project-mutation-update-item',
        'route' => 'project-mutation-update-item',
        'route_type' => 'web',
        'url' => '/employee/project/update-mutation',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Project Mutation Delete',
        'slug' => 'project-mutation-delete',
        'route' => 'project-mutation-delete',
        'route_type' => 'web',
        'url' => '/employee/project/delete-mutation',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Member Company List',
        'slug' => 'member-company-list',
        'route' => 'member-company-list',
        'route_type' => 'web',
        'url' => '/member-company/list',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'Member Company Update',
        'slug' => 'member-company-update',
        'route' => 'member-company-update',
        'route_type' => 'web',
        'url' => '/member-company/update',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'attendance category List',
        'slug' => 'attendance-category-list',
        'route' => 'attendance-category-list',
        'route_type' => 'web',
        'url' => '/attendance/category/list',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'attendance category Create',
        'slug' => 'attendance-category-create',
        'route' => 'attendance-category-create',
        'route_type' => 'web',
        'url' => '/attendance/category/create',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'attendance category update',
        'slug' => 'attendance-category-update',
        'route' => 'attendance-category-update',
        'route_type' => 'web',
        'url' => '/attendance/category/update',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'attendance category delete',
        'slug' => 'attendance-category-delete',
        'route' => 'attendance-category-delete',
        'route_type' => 'web',
        'url' => '/attendance/category/delete',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
      [
        'name' => 'employee reset device id',
        'slug' => 'employee-reset-device-id',
        'route' => 'employee-reset-device-id',
        'route_type' => 'web',
        'url' => '/employee/reset-device-id',
        'is_restricted' => 0,
        'created_by' => 'system',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
    ]);
  }
}