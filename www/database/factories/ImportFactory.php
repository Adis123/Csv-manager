<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Import;
use Faker\Generator as Faker;

const COLUMNS = ['Name', 'Last name'];
const MIN_RECORDS = 5;
const MAX_RECORDS = 15;

$factory->define(Import::class, function (Faker $faker) {
    return [
        'name' => $faker->userName,
        'content' => json_encode(generateImport(rand(0, 80), $faker)),
    ];
});

/**
 * @param int $rowsCount
 * @param Faker $faker
 *
 * @return array
 */
function generateImport(int $rowsCount, Faker $faker): array
{
    $rowsData[] = COLUMNS;
    foreach (range(0, $rowsCount) as $index) {
        $rowsData[$index][] = [
            $faker->name,
            $faker->lastName,
        ];
    }

    return $rowsData;
}
