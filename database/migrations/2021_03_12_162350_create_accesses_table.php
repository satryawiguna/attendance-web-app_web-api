<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('accesses', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name');
      $table->string('slug')->unique();
      $table->text('description')->nullable();
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
    Schema::dropIfExists('accesses');
  }
}
