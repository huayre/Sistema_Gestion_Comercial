<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Almacen\Entities\Marca;

$factory->define(Marca::class, function (Faker $faker) {
    $nombre=$faker->word(10);
    return [
        'nombre'=>$nombre
    ];
});
