<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produsers')->insert([
            ['id' => 1, 'code' => 'PD01', 'name' => 'Marvel', 'international' => 'yes', 'created_at' => '2023-12-30 01:05:11', 'updated_at' => '2023-12-30 01:05:11'],
            ['id' => 2, 'code' => 'PD02', 'name' => 'XBOX', 'international' => 'no', 'created_at' => '2023-12-30 01:11:40', 'updated_at' => '2023-12-30 01:11:40'],
            ['id' => 3, 'code' => 'PD03', 'name' => 'Lamp', 'international' => 'yes', 'created_at' => '2023-12-30 07:05:07', 'updated_at' => '2023-12-30 07:05:07'],
            ['id' => 4, 'code' => 'PD04', 'name' => 'Younglex', 'international' => 'yes', 'created_at' => '2023-12-30 07:05:20', 'updated_at' => '2023-12-30 07:05:20'],
        ]);
    }
}
