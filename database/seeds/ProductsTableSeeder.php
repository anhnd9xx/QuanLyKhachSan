<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 40; $i++) {

        	$name = $faker->text(50);

            \DB::table('products')->insert([
                // 'user_id' => $faker->text(11),
                'name' => $name,
                'slug' => \Illuminate\Support\Str::slug($name),
                'origin_price' => $faker->numberBetween(400000, 800000),
                'sale_price' => $faker->numberBetween(300000, 700000),
                'content' => $faker->text(300),
                'status' => 1,
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
