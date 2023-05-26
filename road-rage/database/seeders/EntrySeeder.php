<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all user IDs from the 'users' table
        $userIds = DB::table('users')->pluck('id');

        // Seeding entries table
        foreach ($userIds as $userId) {
            for ($i = 0; $i < 50; $i++) {
                $created = $faker->dateTimeBetween('-1 year', 'now');

                DB::table('entries')->insert([
                    'user_id' => $faker->randomElement($userIds),
                    'plate' => $faker->regexify('[A-Z]{2}[0-9]{2}[A-Z]{2}'),
                    'message' => $faker->sentence,
                    'upvotes' => $faker->numberBetween(0, 9999),
                    "created_at" => $created,
                    "updated_at" => $faker->dateTimeBetween($created, 'now')
                ]);
            }
        }
    }
}
