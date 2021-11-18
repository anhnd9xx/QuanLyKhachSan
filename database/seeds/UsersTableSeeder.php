<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	$faker = \Faker\Factory::create();
        for ($i = 0; $i < 30; $i++) {
            \DB::table('users')->insert([
                // 'user_id' => $faker->text(11),
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('123456'),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
