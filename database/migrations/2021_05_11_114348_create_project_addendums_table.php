<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectAddendumsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('project_addendums', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('project_id');
      $table->string('reference_number');
      $table->string('name');
      $table->date('start_date');
      $table->date('end_date');
      $table->string('description')->nullable();
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
    Schema::dropIfExists('project_addendums');
  }
}
