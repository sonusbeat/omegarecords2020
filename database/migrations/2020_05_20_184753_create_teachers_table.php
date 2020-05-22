<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
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
            $table->string('first_name', 150);
            $table->string('last_name', 150);
            $table->string('email', 200)->unique();
            $table->string('whatsapp', 150)->unique();
            $table->string('image');
            $table->string('image_name')->unique();
            $table->string('image_alt')->nullable();
            $table->text('biography');

            // Social Media
            $table->string('facebook')->nullable()->unique();
            $table->string('twitter')->nullable()->unique();
            $table->string('instagram')->nullable()->unique();
            $table->string('youtube')->nullable()->unique();

            // SEO
            $table->string('seo_title', 60);
            $table->string('seo_description', 160);
            $table->enum('seo_robots', [
                'index, follow',
                'noindex, follow',
                'index, nofollow',
                'noindex, nofollow',
            ]);

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
        Schema::dropIfExists('teachers');
    }
}
