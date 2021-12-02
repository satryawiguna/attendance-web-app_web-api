<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::insert([
      //user system
      ['username' => 'super.admin.system', 'email' => 'super.admin.system@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['username' => 'admin.system', 'email' => 'admin.system@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],

      //user company
      ['username' => 'admin.company', 'email' => 'admin.company@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['username' => 'owner.company', 'email' => 'owner.company@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['username' => 'manager.company', 'email' => 'manager.company@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['username' => 'staff.company', 'email' => 'staff.company@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],

      //user employee perusahaan baju
      // id = 7
      ['username' => 'admin.perusahaan.baju', 'email' => 'admin.perusahaan.baju@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      // id = 8
      ['username' => 'agus.perusahaan.baju', 'email' => 'agus.perusahaan.baju@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      // id = 9
      ['username' => 'andi.perusahaan.baju', 'email' => 'andi.perusahaan.baju@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      // id = 10
      ['username' => 'tika.perusahaan.baju', 'email' => 'tika.perusahaan.baju@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      // id = 11
      ['username' => 'adi.perusahaan.baju', 'email' => 'adi.perusahaan.baju@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],

      //user employee perusahaan sembako
      // id = 12
      ['username' => 'admin.perusahaan.sembako', 'email' => 'admin.perusahaan.sembako@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      // id = 13
      ['username' => 'krisna.perusahaan.sembako', 'email' => 'krisna.perusahaan.sembako@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      // id = 14
      ['username' => 'andre.perusahaan.sembako', 'email' => 'andre.perusahaan.sembako@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      // id = 15
      ['username' => 'mita.perusahaan.sembako', 'email' => 'mita.perusahaan.sembako@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      // id = 16
      ['username' => 'yelena.perusahaan.sembako', 'email' => 'yelena.perusahaan.sembako@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],

      //user employee perusahaan elektronik
      // id = 17
      ['username' => 'admin.perusahaan.elektronik', 'email' => 'admin.perusahaan.elektronik@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      // id = 18
      ['username' => 'nori.perusahaan.elektronik', 'email' => 'nori.perusahaan.elektronik@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      // id = 19
      ['username' => 'nisa.perusahaan.elektronik', 'email' => 'nisa.perusahaan.elektronik@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      // id = 20
      ['username' => 'kaka.perusahaan.elektronik', 'email' => 'kaka.perusahaan.elektronik@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      // id = 21
      ['username' => 'ani.perusahaan.elektronik', 'email' => 'ani.perusahaan.elektronik@gmail.com', 'password' => bcrypt('12341234'), 'created_by' => 'system', 'device_id' => 'qwertyuiop', 'status' => 'ACTIVE', 'email_verified_at' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
    ]);
  }
}
