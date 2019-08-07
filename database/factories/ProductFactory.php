<?php

use App\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

	// Ruta en donde queremos subir las imágenes
	$filePath = storage_path('app/public/product_image');

	return [
    'title' => $faker->sentence(2, true),
		'product_image' => $faker->image($filePath, 400, 300, null, false),
    // 'category' => $faker->randomElement($array = array ('Cocina','Oficina','Hogar')),
		'category_id'=>$faker->randomDigitNotNull,
		'price' => $faker->randomFloat(2, 100, 99999),
		'description'=> $faker->sentence(10, true),
		'user_id'=> $faker->randomDigitNotNull
  ];
});
