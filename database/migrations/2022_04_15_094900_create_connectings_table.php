<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('connectings', function (Blueprint $table) {
      $table->unsignedBigInteger('title_id');
      $table->unsignedBigInteger('question_answer_id');
      $table->foreign('title_id')->references('id')->on('titles');
      $table->foreign('question_answer_id')->references('id')->on('question_answers');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('connectings');
  }
};
