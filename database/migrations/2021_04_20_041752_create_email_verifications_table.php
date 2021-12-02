<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailVerificationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('email_verifications', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('user_id');
      $table->string('token')->unique();
      $table->boolean('is_used')->default('0');
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
    Schema::dropIfExists('email_verifications');
  }
}
