<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'nama_produk'       => $faker->sentence(3),
        'produk_atau_jasa'  => 1,
        'produk'            => 'HIKVISION',
        'kategori'          => 'Camera',
        'sub_kategori'      => null,
        'deskripsi'         => $faker->sentence(12),
        'harga'             => $faker->numberBetween(50000, 2500000),
    ];
});
