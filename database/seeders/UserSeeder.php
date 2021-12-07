<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $getId = Str::uuid();
            DB::table('users')->insert([
                'uuid' => $getId,
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'user_group' => 'user',
                'password' => Hash::make('12345678'),
                'user_status' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::table('users_account')->insert([
                'uuid' => $getId,
                'gender' => null,
                'phone' => null,
                'address' => null,
                'birth_date' => null,
                'birth_place' => null,
                'country' => null,
                'districts' => null,
                'postcode' => null,
                'photo' => null
            ]);
        }
    }
}
