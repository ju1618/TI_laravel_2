<?php


/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
  // Ruta en donde queremos subir las imágenes
  	$filePath = storage_path('app/public/avatars');

    return [
      'username'=> $faker->userName,
      'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
      'name' => $faker->firstName($gender = null),
      'lastname' => $faker->lastName,
      'email' => $faker->unique()->safeEmail,
      'email_verified_at' => now(),
      'country' => $faker->country,
      // 'state'=> $faker->state,
      // 'state'=> $faker->randomElement($provincias),
      'avatar' => $faker->image($filePath, 300, 300, null, false),
      'remember_token' => Str::random(10),
    ];
});
