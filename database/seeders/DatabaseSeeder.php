<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Card;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Card::factory(10)->create();
    }
}
