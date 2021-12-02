<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('projects', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('parent_id')->nullable();
      $table->string('reference_number');
      $table->integer('company_id');
      $table->string('name');
      $table->string('slug');
      $table->date('start_date');
      $table->date('end_date');
      $table->string('latitude')->nullable();
      $table->string('longitude')->nullable();
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
    Schema::dropIfExists('projects');
  }
}
