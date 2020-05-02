<?php

use App\Models\StudioGallery;
use Illuminate\Database\Seeder;

class StudioGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(StudioGallery::class, 16)->create();
    }
}
