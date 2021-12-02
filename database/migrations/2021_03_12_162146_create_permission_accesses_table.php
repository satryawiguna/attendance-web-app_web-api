<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionAccessesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('permission_accesses', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('permission_id');
      $table->integer('access_id');
      $table->enum('type', ['READ', 'WRITE']);
      $table->enum('value', ['ALLOW', 'DENY']);
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
    Schema::dropIfExists('permission_accesses');
  }
}
