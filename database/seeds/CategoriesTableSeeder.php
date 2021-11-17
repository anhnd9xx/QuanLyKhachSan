<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        	'May tinh',
        	'Dien thoai',
        	'Laptop',
        	'May anh',
        	'Phu kien dien thoai'
        ];
   
	    foreach ($categories as $category) {
	    	\DB::table('categories')->insert([
	                'name' => $category,
	                'slug' => \Illuminate\Support\Str::slug($category),
	                'parent_id' => 0,
	                'depth' => 0,
	                'created_at' => \Carbon\Carbon::now(),
	                'updated_at' => \Carbon\Carbon::now(),
	            ]);
	    } 
	}
}
