<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artis')->insert([
            ['id' => 1, 'code' => 'A001', 'name' => 'Sagita Malam', 'gender' => 'Wanita', 'salary' => 1000000, 'award' => 10, 'country' => 'BR', 'created_at' => '2023-12-30 01:55:24', 'updated_at' => '2023-12-30 03:11:21'],
            ['id' => 2, 'code' => 'A002', 'name' => 'Bruno Mars', 'gender' => 'Pria', 'salary' => 200000, 'award' => 8, 'country' => 'BE', 'created_at' => '2023-12-30 03:13:17', 'updated_at' => '2023-12-30 03:13:17'],
            ['id' => 3, 'code' => 'A003', 'name' => 'Beny Widoyono', 'gender' => 'Pria', 'salary' => 300000, 'award' => 6, 'country' => 'NE', 'created_at' => '2023-12-30 04:49:41', 'updated_at' => '2023-12-30 04:49:41'],
            ['id' => 4, 'code' => 'A004', 'name' => 'Dimas Star', 'gender' => 'Pria', 'salary' => 230000, 'award' => 1, 'country' => 'ARG', 'created_at' => '2023-12-30 04:50:08', 'updated_at' => '2023-12-30 04:50:08'],
            ['id' => 5, 'code' => 'A005', 'name' => 'Faryy Godsss', 'gender' => 'Pria', 'salary' => 230000, 'award' => 2, 'country' => 'TH', 'created_at' => '2023-12-30 04:50:35', 'updated_at' => '2023-12-30 04:50:35'],
            ['id' => 6, 'code' => 'A006', 'name' => 'Roy Metaliccc', 'gender' => 'Pria', 'salary' => 210000, 'award' => 1, 'country' => 'BE', 'created_at' => '2023-12-30 04:50:59', 'updated_at' => '2023-12-30 04:50:59'],
            ['id' => 7, 'code' => 'A007', 'name' => 'Sellena Gomes', 'gender' => 'Wanita', 'salary' => 800000, 'award' => 3, 'country' => 'CN', 'created_at' => '2023-12-30 05:47:03', 'updated_at' => '2023-12-30 05:47:03'],
            ['id' => 8, 'code' => 'A008', 'name' => 'Inobi Kakashiwa', 'gender' => 'Pria', 'salary' => 210000, 'award' => 3, 'country' => 'IN', 'created_at' => '2023-12-30 07:07:12', 'updated_at' => '2023-12-30 07:07:12'],
        ]);
    }
}
