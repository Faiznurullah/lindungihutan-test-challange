<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            ['id' => 1, 'code' => 'G001', 'name' => 'Action', 'created_at' => '2023-12-30 00:25:51', 'updated_at' => '2023-12-30 00:25:51'],
            ['id' => 2, 'code' => 'G002', 'name' => 'Adventure', 'created_at' => '2023-12-30 00:27:05', 'updated_at' => '2023-12-30 00:27:05'],
            ['id' => 3, 'code' => 'G003', 'name' => 'Drama', 'created_at' => '2023-12-30 04:55:20', 'updated_at' => '2023-12-30 04:55:20'],
            ['id' => 4, 'code' => 'G004', 'name' => 'Love', 'created_at' => '2023-12-30 07:05:54', 'updated_at' => '2023-12-30 07:05:54'],
        ]);
    }
}
