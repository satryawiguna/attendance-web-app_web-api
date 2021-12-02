<?php

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Employee::insert([
      ['user_id' => 3, 'full_name' => 'Admin Perusahaan', 'nick_name' => 'Admin', 'company_id' => 4, 'code' => 'AES1', 'work_unit_id' => null, 'position_id' => null, 'nip' => '1234567881', 'nik' => '32134211231', 'created_by' => 'system', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 7, 'full_name' => 'Andi Hidayat', 'nick_name' => 'Andi', 'company_id' => 1, 'code' => 'AES2', 'work_unit_id' => 2, 'position_id' => 2, 'nip' => '1234567890', 'nik' => '32134211232', 'created_by' => 'system', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 8, 'full_name' => 'Ari Santoso', 'nick_name' => 'Ari', 'company_id' => 1, 'code' => 'AES3', 'work_unit_id' => 2, 'position_id' => 2, 'nip' => '1234567891', 'nik' => '32134211233', 'created_by' => 'system', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 9, 'full_name' => 'Bayu Prasetya', 'nick_name' => 'Bayu', 'company_id' => 1, 'code' => 'AES4', 'work_unit_id' => 2, 'position_id' => 2, 'nip' => '1234567892', 'nik' => '32134211234', 'created_by' => 'system', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 10, 'full_name' => 'Banu Sahadipa', 'nick_name' => 'Banu', 'company_id' => 1, 'code' => 'AES5', 'work_unit_id' => 3, 'position_id' => 3, 'nip' => '1234567893', 'nik' => '32134211235', 'created_by' => 'system', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 11, 'full_name' => 'Candra Ari', 'nick_name' => 'Candra', 'company_id' => 1, 'code' => 'AES6', 'work_unit_id' => 3, 'position_id' => 3, 'nip' => '1234567894', 'nik' => '32134211236', 'created_by' => 'system', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 12, 'full_name' => 'Citra Apsara', 'nick_name' => 'Citra', 'company_id' => 2, 'code' => 'AES7', 'work_unit_id' => 5, 'position_id' => 5, 'nip' => '1234567895', 'nik' => '32134211237', 'created_by' => 'system', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 13, 'full_name' => 'Dedi Sumantri', 'nick_name' => 'Dedi', 'company_id' => 2, 'code' => 'AES8', 'work_unit_id' => 5, 'position_id' => 5, 'nip' => '1234567896', 'nik' => '32134211238', 'created_by' => 'system', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 14, 'full_name' => 'Dema Kusuma', 'nick_name' => 'Dema', 'company_id' => 2, 'code' => 'AES9', 'work_unit_id' => 5, 'position_id' => 5, 'nip' => '1234567897', 'nik' => '32134211239', 'created_by' => 'system', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 15, 'full_name' => 'Krisna Anggara', 'nick_name' => 'Krisna', 'company_id' => 2, 'code' => 'AES10', 'work_unit_id' => 6, 'position_id' => 6, 'nip' => '1234567898', 'nik' => '321342112310', 'created_by' => 'system', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 16, 'full_name' => 'Laksmi Dewi', 'nick_name' => 'Laksmi', 'company_id' => 2, 'code' => 'AES11', 'work_unit_id' => 6, 'position_id' => 6, 'nip' => '1234567899', 'nik' => '321342112211', 'created_by' => 'system', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 17, 'full_name' => 'Desi Ratna', 'nick_name' => 'Desi', 'company_id' => 3, 'code' => 'AES12', 'work_unit_id' => 8, 'position_id' => 8, 'nip' => '1234567810', 'nik' => '321342112312', 'created_by' => 'system', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 18, 'full_name' => 'Johan Ray', 'nick_name' => 'Johan', 'company_id' => 3, 'code' => 'AES13', 'work_unit_id' => 8, 'position_id' => 8, 'nip' => '1234567811', 'nik' => '321342112313', 'created_by' => 'system', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 19, 'full_name' => 'Adrian Saputra', 'nick_name' => 'Adrian', 'company_id' => 3, 'code' => 'AES14', 'work_unit_id' => 8, 'position_id' => 8, 'nip' => '1234567812', 'nik' => '321342112314', 'created_by' => 'system', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 20, 'full_name' => 'James Rodri', 'nick_name' => 'James', 'company_id' => 3, 'code' => 'AES15', 'work_unit_id' => 9, 'position_id' => 9, 'nip' => '1234567813', 'nik' => '321342112315', 'created_by' => 'system', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 21, 'full_name' => 'Riski Ardiansyah', 'nick_name' => 'Riski', 'company_id' => 3, 'code' => 'AES16', 'work_unit_id' => 9, 'position_id' => 9, 'nip' => '1234567814', 'nik' => '321342112316', 'created_by' => 'system', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
    ]);
  }
}
