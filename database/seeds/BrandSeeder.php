<?php

use App\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'foto'  => 'public/brand/1.png'
        ]);

        Brand::create([
            'foto'  => 'public/brand/2.png'
        ]);

        Brand::create([
            'foto'  => 'public/brand/3.png'
        ]);

        Brand::create([
            'foto'  => 'public/brand/4.png'
        ]);

        Brand::create([
            'foto'  => 'public/brand/5.png'
        ]);
    }
}
