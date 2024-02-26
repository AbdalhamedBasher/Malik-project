<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Brand::factory(10)->create();
        \App\Models\Catogery::factory(10)->create();
        \App\Models\Customer::factory(10)->create();
        \App\Models\Item::factory(10)->create();
        \App\Models\Project::factory()->count(10)->create();
        \App\Models\Line::factory()->count(10)->create();
        \App\Models\Size::factory()->count(10)->create();
        //unit factory
        Unit::factory()->count(10)->create();
//  type factory
        \App\Models\Type::factory()->count(10)->create();
// size factory
        \App\Models\Size::factory()->count(10)->create();
    }
}
