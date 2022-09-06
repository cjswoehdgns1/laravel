<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

class BoardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i=1;$i<10;$i++) {
            /* 일반 시더 */
            // $container = [
            //     'subject' => '주제'. $i,
            //     'contents' => '내용'. $i,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ];

            /* faker 시더 */
            $container = [
                'email' => 'cjswoehdgns1@naver.com',
                'subject' => $faker->name,
                'contents' => $faker->realText,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            \Illuminate\Support\Facades\DB::table('boards')->insert($container);
        }
    }
}
