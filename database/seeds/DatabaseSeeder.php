<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(UtilitySeeder::class);
        $this->call(SlideShowSeeder::class);
        $this->call(BrandSeeder::class);
    }
}
