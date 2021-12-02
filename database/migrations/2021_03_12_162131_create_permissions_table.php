<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('permissions', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name');
      $table->string('slug')->unique();
      $table->string('route')->unique();
      $table->enum('route_type', ['web', 'api']);
      $table->string('url')->nullable();
      $table->text('description')->nullable();
      $table->boolean('is_restricted')->default(false);
      $table->string('created_by')->nullable();
      $table->string('updated_by')->nullable();
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
    Schema::dropIfExists('permissions');
  }
}
