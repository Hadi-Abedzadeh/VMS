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

        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->text('description');

            $table->timestamps();
        });

        Schema::create('class_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('title');
            $table->string('slug');

            $table->string('body');
            $table->string('teacher_id');
//            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->integer('buyers_count')->default(0);
            $table->integer('price')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('order');

            $table->softDeletes();

            $table->timestamps();
        });


        Schema::create('class_lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('course_id');
            $table->string('title');
            $table->string('slug');
            $table->string('video');
            $table->boolean('video_tag')->default(0);
            $table->text('body');
            $table->boolean('free')->default(0);
            $table->integer('order');
            $table->string('duration',7);
            $table->tinyInteger('free')->default(0);
            $table->softDeletes();

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
        Schema::dropIfExists('class_lessons');
        Schema::dropIfExists('class_courses');
    }
}
