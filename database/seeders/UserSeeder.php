<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $getId = Str::uuid();
        DB::table('users')->insert([
            'uuid' => $getId,
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'user_group' => 'admin',
            'password' => Hash::make('12345678'),
            'user_status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users_account')->insert([
            'uuid' => $getId,
            'gender' => 'Male',
            'phone' => '+6281122334455',
            'address' => 'Jakart',
            'birth_date' => now(),
            'birth_place' => 'Jakarta',
            'country' => 'Indonesia',
            'districts' => 'Jakarta',
            'postcode' => '-',
            'photo' => null
        ]);
    }
}
