<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //clear users table first
        User::truncate();

        //populate the user table with fake datas
        $faker = \Faker\Factory::create();
        //everyone with the same password and hash it before
        $password = Hash::make('secret');

        User::create([
          'name' => 'Administrator',
          'username' => 'Admin',
          'email' => 'admin@admin.com',
          'password' => $password,
        ]);

        //generate fake users
        for ($i = 0; $i < 10; $i++) {
          User::create([
            'name' => $faker->name,
            'username' => $faker->name,
            'email' => $faker->email,
            'password' => $password,
          ]);
        }
    }
}
