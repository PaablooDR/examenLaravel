<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Casal;
use App\Models\Ciutat;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        Casal::factory(10)->create();
        Ciutat::factory(10)->create();
    }
}
