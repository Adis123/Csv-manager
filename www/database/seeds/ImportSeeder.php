<?php

use Illuminate\Database\Seeder;
use App\Entities\Import;

/**
 * Class ImportSeeder
 */
class ImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(Import::class, 50)->create();
    }
}
