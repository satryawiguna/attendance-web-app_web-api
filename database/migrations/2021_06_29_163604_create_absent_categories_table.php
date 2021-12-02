<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsentCategoriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('absent_categories', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('company_id');
      $table->string('name');
      $table->enum('type', ['present', 'absent'])->nullable();
      $table->time('time_start')->nullable();
      $table->time('time_end')->nullable();
      $table->integer('time_tolerance')->nullable();
      $table->integer('is_validate')->default('1');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('absent_categories');
  }
}
