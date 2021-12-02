<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAccessesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('user_accesses', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('user_id');
      $table->integer('permission_id');
      $table->integer('access_id');
      $table->enum('value', ['INHERIT', 'ALLOW', 'DENY']);
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
    Schema::dropIfExists('user_accesses');
  }
}
