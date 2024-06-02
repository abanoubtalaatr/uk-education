<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\City;
use App\Models\District;
use App\Models\Event;
use App\Models\Interest;
use App\Models\Model;
use App\Models\Region;
use App\Models\Type;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);

        User::factory()->count(50)->create();
    }
}
