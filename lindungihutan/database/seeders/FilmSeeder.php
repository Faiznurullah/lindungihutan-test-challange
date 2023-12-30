<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->insert([
            ['id' => 1, 'code' => 'A001', 'title' => 'Iron Man', 'genre' => 'G001', 'artis' => 'A001', 'produser' => 'PD01', 'income' => 1300000, 'nomination' => 1, 'created_at' => '2023-12-30 04:44:38', 'updated_at' => '2023-12-30 04:44:38'],
            ['id' => 2, 'code' => 'F002', 'title' => 'Earth', 'genre' => 'G001', 'artis' => 'A002', 'produser' => 'PD01', 'income' => 10000000, 'nomination' => 1, 'created_at' => '2023-12-30 04:45:57', 'updated_at' => '2023-12-30 04:45:57'],
            ['id' => 3, 'code' => 'F003', 'title' => 'Day', 'genre' => 'G002', 'artis' => 'A003', 'produser' => 'PD02', 'income' => 200000, 'nomination' => 3, 'created_at' => '2023-12-30 04:51:44', 'updated_at' => '2023-12-30 04:51:44'],
            ['id' => 4, 'code' => 'F004', 'title' => 'Strong with me', 'genre' => 'G002', 'artis' => 'A005', 'produser' => 'PD01', 'income' => 1200000, 'nomination' => 4, 'created_at' => '2023-12-30 04:52:10', 'updated_at' => '2023-12-30 04:52:10'],
            ['id' => 5, 'code' => 'F005', 'title' => 'Dramatical', 'genre' => 'G003', 'artis' => 'A002', 'produser' => 'PD02', 'income' => 200000, 'nomination' => 3, 'created_at' => '2023-12-30 04:55:48', 'updated_at' => '2023-12-30 04:55:48'],
            ['id' => 6, 'code' => 'F006', 'title' => 'Beast Art With You', 'genre' => 'G003', 'artis' => 'A001', 'produser' => 'PD01', 'income' => 230000, 'nomination' => 2, 'created_at' => '2023-12-30 04:56:34', 'updated_at' => '2023-12-30 04:56:34'],
            ['id' => 7, 'code' => 'F007', 'title' => 'Goether All', 'genre' => 'G003', 'artis' => 'A001', 'produser' => 'PD02', 'income' => 200000, 'nomination' => 1, 'created_at' => '2023-12-30 04:57:05', 'updated_at' => '2023-12-30 04:57:05'],
            ['id' => 8, 'code' => 'F008', 'title' => 'On', 'genre' => 'G004', 'artis' => 'A001', 'produser' => 'PD03', 'income' => 2345000, 'nomination' => 1, 'created_at' => '2023-12-30 07:06:29', 'updated_at' => '2023-12-30 07:06:29'],
        ]);
    }
}
