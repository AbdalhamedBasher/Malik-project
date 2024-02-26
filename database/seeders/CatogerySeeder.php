<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catogery;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class CatogerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory for catogery use call the factory method and count the number of records you want to create




        $faker = Faker::create();

        // factory for catogery use call the factory method and count the number of records you want to create

        Catogery::factory()->count(10)->create();
    }
}



