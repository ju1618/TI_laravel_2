<?php
/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
    	'name' => $faker->unique()->randomElement($array = [
				'Tecnología',
			  'Muebles',
			  'Cocina',
			  'Indumentaria',
				'Alimentos',
				'Baño',
				'Hogar',
				'Jardín',
        'Decoración',
        'Iluminación',
        'Accesorios',
        'Escritorio',
			])
    ];
});
