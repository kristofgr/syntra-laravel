<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $created = $faker->dateTimeBetween('-3 year', '- 2 year');

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            "created_at" => $created,
            "updated_at" => $faker->dateTimeBetween($created, 'now')
        ]);

        $created = $faker->dateTimeBetween('-2 year', '- 1 year');

        DB::table('users')->insert([
            'name' => 'Kristof',
            'email' => 'kristof@nizer.be',
            'password' => Hash::make('test1234'),
            "created_at" => $created,
            "updated_at" => $faker->dateTimeBetween($created, 'now')
        ]);

        $created = $faker->dateTimeBetween('-1 year', 'now');

        for ($i = 0; $i < 50; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                "created_at" => $created,
                "updated_at" => $faker->dateTimeBetween($created, 'now')
            ]);
        }

    }
}
