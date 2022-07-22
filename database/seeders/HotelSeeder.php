<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $img = 'hotels/'.uniqid().'.jpg';
        Storage::disk('local')->put($img, file_get_contents('https://source.unsplash.com/random'));
        $faker = Faker::create();

        $hotel = new \App\Models\Hotel();
        $hotel->title = $faker->company();
        $hotel->image= $img;
        $hotel->price = $faker->randomNumber(4, true);
        $hotel->days = $faker->randomDigitNotNull();
        $hotel->country_id = 1;
        $hotel->save();
    }
}