<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $customer = new \App\Models\Customer();
        $customer->name = $faker->firstName();
        $customer->surname = $faker->lastName();
        $customer->email = $faker->email();
        $customer->phone = $faker->phoneNumber();
        $customer->hotel_id = 1;
        $customer->save();
    }
}