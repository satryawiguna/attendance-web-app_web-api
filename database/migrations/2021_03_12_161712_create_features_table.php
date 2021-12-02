<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('features', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('feature_name');
      $table->boolean('is_active')->default(true);
      $table->string('description')->nullable();
      $table->string('unit_status')->nullable();
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
    Schema::dropIfExists('features');
  }
}
