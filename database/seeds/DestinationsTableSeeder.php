<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DestinationsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = Storage::disk('public')->allFiles('destinations/media');
        Storage::disk('public')->delete($files);

        factory(App\Destination::class, 20)->create()->each(function ($m) {
            $m->media()->saveMany(factory(App\DestinationMedia::class,1)->make());
        });
    }

}
