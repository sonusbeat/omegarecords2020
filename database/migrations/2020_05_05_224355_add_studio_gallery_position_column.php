<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStudioGalleryPositionColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('studio_galleries', function (Blueprint $table) {
            $table->integer('position')
                ->default(0)
                ->nullable()
                ->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('studio_galleries', function (Blueprint $table) {
            $table->dropColumn('position');
        });
    }
}
