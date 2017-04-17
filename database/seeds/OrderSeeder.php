<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('order')->insert([
			[
				'order_no' => str_random(10),
				'order_price' => rand(100,1000),
			],
			[
				'order_no' => str_random(10),
				'order_price' => rand(100,1000),
			],
			[
				'order_no' => str_random(10),
				'order_price' => rand(100,1000),
			]
		]);
    }
}
