<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 5; $i++){
            $service = new Service();
            $service->titolo = $faker->sentence();
            $service->slug = Service::generateSlug($service->titolo);
            $service->descrizione = $faker->paragraph();
            $service->save();
        }
    }
}
