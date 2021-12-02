<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//landing page
// Route::get('/', 'Landing\HomeController@home');
// Route::get('send-mail', 'Helper\SendMailjet@test');

//auth
Route::match(['get', 'post'], 'login', 'Web\Auth\LoginController@login')->name('login')->middleware('logincheck');
Route::match(['get', 'post'], 'logout', 'Web\Auth\LoginController@logout')->name('logout');
Route::match(['get', 'post'], 'register', 'Web\Auth\RegisterController@register')->name('register');
Route::match(['get', 'post'], 'forgot-password', 'Web\Auth\ResetPasswordController@forgotPassword')->name('forgot-password');
Route::match(['get', 'post'], 'reset-password/{token}', 'Web\Auth\ResetPasswordController@resetPassword')->name('reset-password');
Route::match(['get', 'post'], 'email-verification/{token}', 'Web\Auth\EmailVerificationController@userEmailVerification')->name('email-verification');
Route::match(['get', 'post'], 'resend-email-verification', 'Web\Auth\EmailVerificationController@resendEmailVerification')->name('resend-email-verification');

//employee nip qrcode
Route::match(['get', 'post'], 'qrcode/{nip}', 'Web\Employee\EmployeeController@getQrcode')->name('employee-qrcode');

//user logged in
Route::group(['middleware' => ['checkauth', 'check_attendance_category']], function () {
  Route::match(['get', 'post'], '/', 'Web\Home\HomeController@home')->name('home');

  Route::group(['prefix' => 'common'], function () {
    Route::group(['prefix' => 'country'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Common\CountryController@countryList')->name('common-country-list');
      Route::match(['get', 'post'], 'create', 'Web\Common\CountryController@countryCreate')->name('common-country-create');
      Route::match(['get', 'post'], 'update', 'web\Common\CountryController@countryEdit')->name('common-country-update');
      Route::match(['get', 'post'], 'delete/{id}', 'Web\Common\CountryController@countryDelete')->name('common-country-delete');
    });

    Route::group(['prefix' => 'state'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Common\StateController@stateList')->name('common-state-list');
      Route::match(['get', 'post'], 'create', 'Web\Common\StateController@stateCreate')->name('common-state-create');
      Route::match(['get', 'post'], 'update', 'web\Common\StateController@stateEdit')->name('common-state-update');
      Route::match(['get', 'post'], 'delete/{id}', 'Web\Common\StateController@stateDelete')->name('common-state-delete');
    });

    Route::group(['prefix' => 'city'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Common\CityController@cityList')->name('common-city-list');
      Route::match(['get', 'post'], 'create', 'Web\Common\CityController@cityCreate')->name('common-city-create');
      Route::match(['get', 'post'], 'update', 'web\Common\CityController@cityEdit')->name('common-city-update');
      Route::match(['get', 'post'], 'delete/{id}', 'Web\Common\CityController@cityDelete')->name('common-city-delete');
    });

    Route::group(['prefix' => 'feature'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Common\FeatureController@featureList')->name('common-feature-list');
      Route::match(['get', 'post'], 'create', 'Web\Common\FeatureController@featureCreate')->name('common-feature-create');
      Route::match(['get', 'post'], 'update', 'web\Common\FeatureController@featureEdit')->name('common-feature-update');
      Route::match(['get', 'post'], 'delete/{id}', 'Web\Common\FeatureController@featureDelete')->name('common-feature-delete');
    });

    Route::group(['prefix' => 'religion'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Common\ReligionController@religionList')->name('common-religion-list');
      Route::match(['get', 'post'], 'create', 'Web\Common\ReligionController@religionCreate')->name('common-religion-create');
      Route::match(['get', 'post'], 'update', 'web\Common\ReligionController@religionEdit')->name('common-religion-update');
      Route::match(['get', 'post'], 'delete/{id}', 'Web\Common\ReligionController@religionDelete')->name('common-religion-delete');
    });

    Route::group(['prefix' => 'role'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Common\RoleController@roleList')->name('common-role-list');
      Route::match(['get', 'post'], 'create', 'Web\Common\RoleController@roleCreate')->name('common-role-create');
      Route::match(['get', 'post'], 'update', 'web\Common\RoleController@roleEdit')->name('common-role-update');
      Route::match(['get', 'post'], 'delete/{id}', 'Web\Common\RoleController@roleDelete')->name('common-role-delete');

      //ajax
      Route::match(['get', 'post'], 'get-permission/{role_id}', 'Web\Common\RoleController@getRolePermission')->name('common-role-get-permission');
    });

    Route::group(['prefix' => 'group'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Common\GroupController@groupList')->name('common-group-list');
      Route::match(['get', 'post'], 'create', 'Web\Common\GroupController@groupCreate')->name('common-group-create');
      Route::match(['get', 'post'], 'update', 'web\Common\GroupController@groupEdit')->name('common-group-update');
      Route::match(['get', 'post'], 'delete/{id}', 'Web\Common\GroupController@groupDelete')->name('common-group-delete');
    });

    Route::group(['prefix' => 'permission'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Common\PermissionController@permissionList')->name('common-permission-list');
      Route::match(['get', 'post'], 'create', 'Web\Common\PermissionController@permissionCreate')->name('common-permission-create');
      Route::match(['get', 'post'], 'update', 'web\Common\PermissionController@permissionEdit')->name('common-permission-update');
      Route::match(['get', 'post'], 'delete/{id}', 'Web\Common\PermissionController@permissionDelete')->name('common-permission-delete');

      //ajax
      Route::match(['get', 'post'], 'get-role', 'Web\Common\PermissionController@getRole')->name('common-permission-get-role');
    });

    Route::group(['prefix' => 'access'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Common\AccessController@accessList')->name('common-access-list');
      Route::match(['get', 'post'], 'create', 'Web\Common\AccessController@accessCreate')->name('common-access-create');
      Route::match(['get', 'post'], 'update', 'web\Common\AccessController@accessEdit')->name('common-access-update');
      Route::match(['get', 'post'], 'delete/{id}', 'Web\Common\AccessController@accessDelete')->name('common-access-delete');

      //ajax
      Route::match(['get', 'post'], 'get-permission/{access_id}', 'Web\Common\AccessController@getRolePermission')->name('common-access-get-permission');
    });
  });

  Route::group(['prefix' => 'master', 'middleware' => 'usercompany'], function () {
    Route::group(['prefix' => 'office'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Master\OfficeController@officeList')->name('master-office-list');
      Route::match(['get', 'post'], 'create', 'Web\Master\OfficeController@officeCreate')->name('master-office-create');
      Route::match(['get', 'post'], 'update', 'Web\Master\OfficeController@officeEdit')->name('master-office-update');
      Route::match(['get', 'post'], 'delete/{id}', 'Web\Master\OfficeController@officeDelete')->name('master-office-delete');
    });

    Route::group(['prefix' => 'work-unit'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Master\WorkUnitController@workUnitList')->name('master-work-unit-list');
      Route::match(['get', 'post'], 'create', 'Web\Master\WorkUnitController@workUnitCreate')->name('master-work-unit-create');
      Route::match(['get', 'post'], 'update', 'web\Master\WorkUnitController@workUnitEdit')->name('master-work-unit-update');
      Route::match(['get', 'post'], 'delete/{id}', 'Web\Master\WorkUnitController@workUnitDelete')->name('master-work-unit-delete');
    });

    Route::group(['prefix' => 'position'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Master\PositionController@positionList')->name('master-position-list');
      Route::match(['get', 'post'], 'create', 'Web\Master\PositionController@positionCreate')->name('master-position-create');
      Route::match(['get', 'post'], 'update', 'web\Master\PositionController@positionEdit')->name('master-position-update');
      Route::match(['get', 'post'], 'delete/{id}', 'Web\Master\PositionController@positionDelete')->name('master-position-delete');
    });

    Route::group(['prefix' => 'work-area'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Master\WorkAreaController@workAreaList')->name('master-work-area-list');
      Route::match(['get', 'post'], 'create', 'Web\Master\WorkAreaController@workAreaCreate')->name('master-work-area-create');
      Route::match(['get', 'post'], 'update', 'web\Master\WorkAreaController@workAreaEdit')->name('master-work-area-update');
      Route::match(['get', 'post'], 'delete/{id}', 'Web\Master\WorkAreaController@workAreaDelete')->name('master-work-area-delete');

      //ajax
      Route::match(['get', 'post'], 'get-state', 'Web\Master\WorkAreaController@getState')->name('master-work-area-get-state');
      Route::match(['get', 'post'], 'get-city', 'Web\Master\WorkAreaController@getCity')->name('master-work-area-get-city');
      Route::match(['get', 'post'], 'area-list', 'Web\Master\WorkAreaController@areaList')->name('master-work-area-list-ajax');
    });
  });

  Route::group(['prefix' => 'role-permission'], function () {
    Route::match(['get', 'post'], 'list', 'Web\Permission\RolePermissionController@listPermission')->name('role-permission-list');
    Route::match(['get', 'post'], 'update/{role_id}', 'Web\Permission\RolePermissionController@updatePermission')->name('role-permission-update');
  });

  Route::group(['prefix' => 'user-permission'], function () {
    Route::match(['get', 'post'], 'list', 'Web\Permission\UserPermissionController@listPermission')->name('user-permission-list');
    Route::match(['get', 'post'], 'update/{user_id}', 'Web\Permission\UserPermissionController@updatePermission')->name('user-permission-update');
  });

  Route::group(['prefix' => 'employee', 'middleware' => 'usercompany'], function () {
    Route::match(['get', 'post'], 'list', 'Web\Employee\EmployeeController@listEmployee')->name('employee-list');
    Route::match(['get', 'post'], 'create', 'Web\Employee\EmployeeController@createEmployee')->name('employee-create');
    Route::match(['get', 'post'], 'update', 'Web\Employee\EmployeeController@updateEmployee')->name('employee-update');
    Route::match(['get', 'post'], 'delete/{id}', 'Web\Employee\EmployeeController@deleteEmployee')->name('employee-delete');
    Route::match(['get', 'post'], 'search', 'Web\Employee\EmployeeController@searchEmployee')->name('employee-search');
    Route::match(['get', 'post'], 'reset-device-id/{id}', 'Web\Employee\EmployeeController@resetDeviceId')->name('employee-reset-device-id');

    Route::group(['prefix' => 'project'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Employee\EmployeeController@listEmployeeMutation')->name('project-mutation-list');
      Route::match(['get', 'post'], 'update/{employee_id}', 'Web\Employee\EmployeeController@updateEmployeeMutation')->name('project-mutation-update');
      Route::match(['get', 'post'], 'update-mutation', 'Web\Employee\EmployeeController@projectUpdateMutation')->name('project-mutation-update-item');
      Route::match(['get', 'post'], 'delete-mutation/{id}', 'Web\Employee\EmployeeController@deleteProjectMutation')->name('project-mutation-delete');
    });
  });

  Route::group(['prefix' => 'setting'], function () {
    Route::match(['get', 'post'], 'user-profile', 'Web\Setting\ProfileSettingController@getProfile')->name('setting-user-profile');
    Route::match(['get', 'post'], 'update-profile', 'Web\Setting\ProfileSettingController@updateProfile')->name('setting-update-profile');
    Route::match(['get', 'post'], 'feature', 'Web\Setting\FeatureSettingController@getFeature')->name('setting-feature');
  });

  Route::group(['prefix' => 'project', 'middleware' => 'usercompany'], function () {
    Route::match(['get', 'post'], 'list', 'Web\Project\ProjectController@projectList')->name('project-list');
    Route::match(['get', 'post'], 'create', 'Web\Project\ProjectController@projectCreate')->name('project-create');
    Route::match(['get', 'post'], 'update', 'Web\Project\ProjectController@projectUpdate')->name('project-update');
    Route::match(['get', 'post'], 'delete/{id}', 'Web\Project\ProjectController@projectDelete')->name('project-delete');

    Route::group(['prefix' => 'work-unit'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Project\ProjectController@listProjectWorkUnit')->name('project-work-unit-list');
      Route::match(['get', 'post'], 'update/{project_id}', 'Web\Project\ProjectController@updateProjectWorkUnit')->name('project-work-unit-update');
    });

    Route::group(['prefix' => 'addendum'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Project\ProjectController@projectAddendumList')->name('project-addendum-list');
      Route::match(['get', 'post'], 'create', 'Web\Project\ProjectController@projectAddendumCreate')->name('project-addendum-create');
      Route::match(['get', 'post'], 'update', 'Web\Project\ProjectController@projectAddendumUpdate')->name('project-addendum-update');
      Route::match(['get', 'post'], 'delete/{id}', 'Web\Project\ProjectController@projectAddendumDelete')->name('project-addendum-delete');
    });
  });

  Route::group(['prefix' => 'member-company'], function () {
    Route::match(['get', 'post'], 'list', 'Web\Member\MemberController@memberList')->name('member-company-list');
    Route::match(['get', 'post'], 'update', 'Web\Member\MemberController@memberUpdate')->name('member-company-update');
  });

  Route::group(['prefix' => 'attendance', 'middleware' => 'usercompany'], function () {
    Route::group(['prefix' => 'category'], function () {
      Route::match(['get', 'post'], 'list', 'Web\Attendance\AttendanceController@attendanceCategoryList')->name('attendance-category-list');
      Route::match(['get', 'post'], 'create', 'Web\Attendance\AttendanceController@attendanceCategoryCreate')->name('attendance-category-create');
      Route::match(['get', 'post'], 'update', 'web\Attendance\AttendanceController@attendanceCategoryEdit')->name('attendance-category-update');
      Route::match(['get', 'post'], 'delete/{id}', 'Web\Attendance\AttendanceController@attendanceCategoryDelete')->name('attendance-category-delete');
    });

    Route::match(['get', 'post'], 'report', 'Web\Attendance\AttendanceController@attendanceReport')->name('attendance-report');
  });
});
