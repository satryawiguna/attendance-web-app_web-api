<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsentCategoryDetailsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('absent_category_details', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('absent_category_id');
      $table->string('field_name');
      $table->enum('type', ['text, number, file']);
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
    Schema::dropIfExists('absent_category_details');
  }
}
