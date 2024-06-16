<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->mediumText('short_description');
            $table->longText('description');
            $table->string('level');
            $table->mediumText('requirements');
            $table->mediumText('curriculum')->nullable();
            $table->string('outcome');
            $table->integer('discount_price')->default('0');
            $table->integer('original_price')->default('0');
            $table->string('yt_iframe')->nullable();
            $table->string('image_path')->nullable();
            $table->string('meta_title')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->tinyInteger('status');
            $table->tinyInteger('top_course');
            $table->tinyInteger('free_course');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('courses');
    }
}
