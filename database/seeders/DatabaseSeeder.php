<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * php artisan db:seed
     * @return void
     */
    public function run()
    {
        // seeders 마이그레이션(테이블 별)
        $this->call(BoardTableSeeder::class);
        // factory 마이그레이션(릴레이션 별)
        // \App\Models\Board::factory(50)->create();
        \App\Models\User::factory(10)->create();
    }
}
