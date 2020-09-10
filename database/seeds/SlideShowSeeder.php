<?php

use App\SlideShow;
use Illuminate\Database\Seeder;

class SlideShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SlideShow::create([
            'foto'  => 'public/slide-show/1.jpg'
        ]);
        SlideShow::create([
            'foto'  => 'public/slide-show/2.jpg'
        ]);
        SlideShow::create([
            'foto'  => 'public/slide-show/3.jpg'
        ]);
    }
}
