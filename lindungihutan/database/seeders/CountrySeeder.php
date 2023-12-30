<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            ['id' => 3, 'code' => 'UK', 'name' => 'United Kingdom', 'created_at' => '2023-12-29 03:29:09', 'updated_at' => '2023-12-29 03:29:09'],
            ['id' => 5, 'code' => 'IN', 'name' => 'India', 'created_at' => '2023-12-29 03:37:23', 'updated_at' => '2023-12-29 03:37:23'],
            ['id' => 6, 'code' => 'BE', 'name' => 'Belgium', 'created_at' => '2023-12-29 03:37:54', 'updated_at' => '2023-12-29 03:37:54'],
            ['id' => 7, 'code' => 'LI', 'name' => 'Lithuania', 'created_at' => '2023-12-29 03:38:50', 'updated_at' => '2023-12-29 03:38:50'],
            ['id' => 8, 'code' => 'DN', 'name' => 'Denmark', 'created_at' => '2023-12-29 03:45:47', 'updated_at' => '2023-12-29 03:45:47'],
            ['id' => 9, 'code' => 'NE', 'name' => 'Netherlands', 'created_at' => '2023-12-29 03:47:47', 'updated_at' => '2023-12-29 03:47:47'],
            ['id' => 10, 'code' => 'MY', 'name' => 'Malaysia', 'created_at' => '2023-12-29 04:02:28', 'updated_at' => '2023-12-29 04:02:28'],
            ['id' => 11, 'code' => 'TH', 'name' => 'Thailand', 'created_at' => '2023-12-29 04:19:30', 'updated_at' => '2023-12-29 04:19:30'],
            ['id' => 12, 'code' => 'BR', 'name' => 'Brunei', 'created_at' => '2023-12-29 04:21:39', 'updated_at' => '2023-12-29 04:21:39'],
            ['id' => 13, 'code' => 'JPN', 'name' => 'Japan', 'created_at' => '2023-12-29 19:02:31', 'updated_at' => '2023-12-29 19:02:31'],
            ['id' => 14, 'code' => 'KL', 'name' => 'Colombia', 'created_at' => '2023-12-29 19:04:59', 'updated_at' => '2023-12-29 19:04:59'],
            ['id' => 15, 'code' => 'GR', 'name' => 'Germany', 'created_at' => '2023-12-29 19:07:15', 'updated_at' => '2023-12-29 19:07:15'],
            ['id' => 16, 'code' => 'CN', 'name' => 'Canada', 'created_at' => '2023-12-29 19:07:57', 'updated_at' => '2023-12-29 19:07:57'],
            ['id' => 21, 'code' => 'MSR', 'name' => 'Egypt Kingdom', 'created_at' => '2023-12-29 23:12:02', 'updated_at' => '2023-12-29 23:12:15'],
            ['id' => 25, 'code' => 'ARG', 'name' => 'Argentina', 'created_at' => '2023-12-29 23:15:08', 'updated_at' => '2023-12-29 23:15:08'],
            ['id' => 26, 'code' => 'JKL', 'name' => 'Jakarta', 'created_at' => '2023-12-29 23:31:23', 'updated_at' => '2023-12-29 23:31:23'],
            ['id' => 27, 'code' => 'BKS', 'name' => 'Bekasi', 'created_at' => '2023-12-29 23:33:14', 'updated_at' => '2023-12-29 23:33:14'],
            ['id' => 28, 'code' => 'BDG', 'name' => 'Bandung City', 'created_at' => '2023-12-29 23:37:31', 'updated_at' => '2023-12-30 00:16:40'],
            ['id' => 30, 'code' => 'KRS', 'name' => 'Croatia', 'created_at' => '2023-12-30 06:54:32', 'updated_at' => '2023-12-30 06:54:32'],
        ]);
    }
}
