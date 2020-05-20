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
            $table->bigIncrements('id');
            $table->integer('teacher_id')->nullable()->default(0);
            $table->string('title', 150);
            $table->string('permalink', 150)->unique();
            $table->string('image')->nullable()->default('image_placeholder.jpg');
            $table->string('image_alt')->nullable();
            $table->string('description');
            $table->string('video')->nullable();
            $table->text('overview');
            $table->text('topics');
            $table->text('content');
            $table->integer('position')->nullable()->default(0);
            $table->integer('price')->nullable()->default(0);
            $table->date('start_date')->nullable();
            $table->string('duration', 150)->nullable();
            $table->boolean('active')->nullable()->default(0);
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
