<?php

use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    UserProfile::insert([
      ['user_id' => 7, 'full_name' => 'Admin Baju', 'nick_name' => 'Baju', 'phone' => '081999501092', 'religion_id' => 1, 'country_id' => 1, 'state_id' => 17, 'city_id' => 217, 'address' => 'Jalan Raya Sudirman', 'postcode' => '82214', 'gender' => 'MALE', 'birth_date' => '1997-04-16', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 8, 'full_name' => 'Agus Baju', 'nick_name' => 'Agus', 'phone' => '081999501092', 'religion_id' => 3, 'country_id' => 1, 'state_id' => 17, 'city_id' => 217, 'address' => 'Jalan Raya Sudirman', 'postcode' => '82214', 'gender' => 'MALE', 'birth_date' => '1997-04-16', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 9, 'full_name' => 'Andi Baju', 'nick_name' => 'Andi', 'phone' => '081999501092', 'religion_id' => 4, 'country_id' => 1, 'state_id' => 17, 'city_id' => 217, 'address' => 'Jalan Raya Sudirman', 'postcode' => '82214', 'gender' => 'MALE', 'birth_date' => '1997-04-16', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 10, 'full_name' => 'Tika Baju', 'nick_name' => 'Tika', 'phone' => '081999501092', 'religion_id' => 2, 'country_id' => 1, 'state_id' => 17, 'city_id' => 217, 'address' => 'Jalan Raya Sudirman', 'postcode' => '82214', 'gender' => 'MALE', 'birth_date' => '1997-04-16', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 11, 'full_name' => 'Adi Baju', 'nick_name' => 'Adi', 'phone' => '081999501092', 'religion_id' => 5, 'country_id' => 1, 'state_id' => 17, 'city_id' => 217, 'address' => 'Jalan Raya Sudirman', 'postcode' => '82214', 'gender' => 'MALE', 'birth_date' => '1997-04-16', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 12, 'full_name' => 'Admin Sembako', 'nick_name' => 'Sembako', 'phone' => '081999501092', 'religion_id' => 6, 'country_id' => 1, 'state_id' => 17, 'city_id' => 217, 'address' => 'Jalan Raya Sudirman', 'postcode' => '82214', 'gender' => 'MALE', 'birth_date' => '1997-04-16', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 13, 'full_name' => 'Krisna Sembako', 'nick_name' => 'sembako', 'phone' => '081999501092', 'religion_id' => 2, 'country_id' => 1, 'state_id' => 17, 'city_id' => 217, 'address' => 'Jalan Raya Sudirman', 'postcode' => '82214', 'gender' => 'MALE', 'birth_date' => '1997-04-16', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 14, 'full_name' => 'Andre Sembako', 'nick_name' => 'sembako', 'phone' => '081999501092', 'religion_id' => 4, 'country_id' => 1, 'state_id' => 17, 'city_id' => 217, 'address' => 'Jalan Raya Sudirman', 'postcode' => '82214', 'gender' => 'MALE', 'birth_date' => '1997-04-16', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 15, 'full_name' => 'Mita Sembako', 'nick_name' => 'sembako', 'phone' => '081999501092', 'religion_id' => 3, 'country_id' => 1, 'state_id' => 17, 'city_id' => 217, 'address' => 'Jalan Raya Sudirman', 'postcode' => '82214', 'gender' => 'MALE', 'birth_date' => '1997-04-16', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 16, 'full_name' => 'Yelena Sembako', 'nick_name' => 'sembako', 'phone' => '081999501092', 'religion_id' => 1, 'country_id' => 1, 'state_id' => 17, 'city_id' => 217, 'address' => 'Jalan Raya Sudirman', 'postcode' => '82214', 'gender' => 'MALE', 'birth_date' => '1997-04-16', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 17, 'full_name' => 'Admin Elektronik', 'nick_name' => 'Elektronik', 'phone' => '081999501092', 'religion_id' => 1, 'country_id' => 1, 'state_id' => 17, 'city_id' => 217, 'address' => 'Jalan Raya Sudirman', 'postcode' => '82214', 'gender' => 'MALE', 'birth_date' => '1997-04-16', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 18, 'full_name' => 'Nori Elektronik', 'nick_name' => 'Nori', 'phone' => '081999501092', 'religion_id' => 5, 'country_id' => 1, 'state_id' => 17, 'city_id' => 217, 'address' => 'Jalan Raya Sudirman', 'postcode' => '82214', 'gender' => 'MALE', 'birth_date' => '1997-04-16', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 19, 'full_name' => 'Nisa Elektronik', 'nick_name' => 'Nisa', 'phone' => '081999501092', 'religion_id' => 3, 'country_id' => 1, 'state_id' => 17, 'city_id' => 217, 'address' => 'Jalan Raya Sudirman', 'postcode' => '82214', 'gender' => 'MALE', 'birth_date' => '1997-04-16', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 20, 'full_name' => 'Kaka Elektronik', 'nick_name' => 'Kaka', 'phone' => '081999501092', 'religion_id' => 2, 'country_id' => 1, 'state_id' => 17, 'city_id' => 217, 'address' => 'Jalan Raya Sudirman', 'postcode' => '82214', 'gender' => 'MALE', 'birth_date' => '1997-04-16', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 21, 'full_name' => 'Ani Elektronik', 'nick_name' => 'Ani', 'phone' => '081999501092', 'religion_id' => 4, 'country_id' => 1, 'state_id' => 17, 'city_id' => 217, 'address' => 'Jalan Raya Sudirman', 'postcode' => '82214', 'gender' => 'MALE', 'birth_date' => '1997-04-16', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
    ]);
  }
}
