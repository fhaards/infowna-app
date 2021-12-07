<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;

class FooController extends Controller
{
    public function index()
    {
        $data = [];
        $faker = Faker::create();
        foreach (range(1, 5) as $index) {
            return $data[] = [
                'name' => $faker->name,
                'email' => $faker->safeEmail
            ];
        }
    }

    public function getName()
    {
    }
}
