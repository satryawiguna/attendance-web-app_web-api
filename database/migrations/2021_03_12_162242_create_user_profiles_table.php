<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('user_profiles', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('user_id')->nullable();
      $table->string('full_name');
      $table->string('nick_name')->nullable();
      $table->string('phone')->nullable();
      $table->integer('country_id')->nullable();
      $table->integer('state_id')->nullable();
      $table->integer('city_id')->nullable();
      $table->string('address')->nullable();
      $table->string('postcode')->nullable();
      $table->enum('gender', ['MALE', 'FEMALE'])->nullable();
      $table->integer('religion_id')->nullable();
      $table->date('birth_date')->nullable();
      $table->string('photo_profile')->nullable();
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
    Schema::dropIfExists('user_profiles');
  }
}
