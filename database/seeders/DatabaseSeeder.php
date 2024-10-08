<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach(range(1, 20) as $index)
        {
            User::create([
                'name'  => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password'  => Hash::make('password'),
                'email_verified_at' => now(),
                'created_at'    => now(),
            ]);
        }

        foreach(range(1, 40) as $post)
        {
            Post::create([
                'user_id'   => rand(1, 20),
                'contents'  => $faker->paragraph(),
                'created_at'=> now(),
            ]);
        }
    }
}
