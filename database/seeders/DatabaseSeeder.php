<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Todo;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([UserSeeder::class]);
        Todo::factory(50)->recycle([
            //file terpisah
            User::all()

            //satu file
            // Category::factory(4)->create(),
            // User::factory(5)->create()
        ])->create();
    }
}
