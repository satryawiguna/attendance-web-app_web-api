<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('absents', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('employee_id');
      $table->integer('absent_category_id')->nullable();
      $table->integer('project_id')->nullable();
      $table->enum('type', ['present', 'absent'])->nullable();
      $table->date('date');
      $table->time('time_start');
      $table->time('time_end')->nullable();
      $table->integer('status')->default('0');
      $table->string('description')->nullable();
      $table->string('longitude')->nullable();
      $table->string('latitude')->nullable();
      $table->string('temperature')->nullable();
      $table->string('attachment')->nullable();
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
    Schema::dropIfExists('absents');
  }
}
