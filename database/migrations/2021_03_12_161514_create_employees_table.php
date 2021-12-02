<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('employees', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('user_id')->nullable();
      $table->string('code')->unique();
      $table->integer('company_id');
      $table->integer('office_id')->nullable();
      $table->integer('work_area_id')->nullable();
      $table->integer('work_unit_id')->nullable();
      $table->integer('position_id')->nullable();
      $table->string('full_name')->nullable();
      $table->string('nip');
      $table->string('nik')->unique();
      $table->string('nick_name')->nullable();
      $table->enum('gender', ['MALE', 'FEMALE'])->nullable();
      $table->string('religion_id')->nullable();
      $table->string('birth_place')->nullable();
      $table->date('birth_date')->nullable();
      $table->string('address')->nullable();
      $table->string('phone')->nullable();
      $table->string('email')->nullable();
      $table->integer('status')->default('1'); //0 = non active, 1 = active, -1 = blacklist, -2 = out
      $table->string('created_by')->nullable();
      $table->string('updated_by')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('employees');
  }
}
