<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Work;
use Illuminate\Support\Str;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 5; $i++){
            $work = new Work();
            $work->titolo = $faker->sentence(4);
            $work->slug = Work::generateSlug($work->titolo);
            $work->descrizione = $faker->paragraph(4);
            $work->save();
        }
       
    }
}
