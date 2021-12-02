<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkUnitsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('work_units', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('parent_id')->nullable();
      $table->integer('company_id');
      $table->string('name');
      $table->string('slug');
      $table->string('created_by')->nullable();
      $table->string('modified_by')->nullable();
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
    Schema::dropIfExists('work_units');
  }
}
