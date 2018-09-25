<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
                'type' => 'tin',
        		'name' => 'Lemon Grass',
                'description' => 'tin candle',
                'price' => 11,
                'picture_url' => 'images/tin/Lemongrass Sage.jpg',
        	]);
    }
}
