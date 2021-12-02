<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkAreasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('work_areas', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('company_id');
      $table->string('code');
      $table->string('title');
      $table->string('slug');
      $table->integer('country_id');
      $table->integer('state_id');
      $table->integer('city_id');
      $table->string('address');
      $table->string('postcode');
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
    Schema::dropIfExists('work_areas');
  }
}
