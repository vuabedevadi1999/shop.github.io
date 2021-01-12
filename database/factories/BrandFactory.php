<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'brand_name'=>$faker->name,
        'brand_desc'=>$faker->paragraph(100),
        'brand_status'=>rand(0,1)
    ];
});
