<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            StaticPageSeeder::class,
            MainPageSeeder::class,
            NewsTableSeeder::class,
            ActionsTableSeeder::class,
            SeosTableSeeder::class,
        ]);
    }
}
