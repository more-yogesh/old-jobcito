<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_profiles_id')->nullable();
            $table->unsignedBigInteger('employer_profiles_id')->nullable();
            $table->string('employee_message')->nullable();
            $table->string('employee_title')->nullable();
            $table->string('employer_message')->nullable();
            $table->string('employer_title')->nullable();
            $table->integer('employee_rating')->nullable();
            $table->integer('employer_rating')->nullable();
            $table->enum('report', ['no', 'yes']);
            $table->timestamps();
            $table->foreign('employee_profiles_id')->references('id')->on('employee_profiles')->onDelete('cascade');
            $table->foreign('employer_profiles_id')->references('id')->on('employer_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
