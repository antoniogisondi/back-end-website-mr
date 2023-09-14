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
            $work->titolo = $faker->sentence();
            $work->slug = Work::generateSlug($work->titolo);
            $work->descrizione = $faker->paragraph();
            $work->costo = $faker->randomFloat(2, 100, 10000);
            $work->data_inizio = $faker->date();
            $work->data_fine = $faker->date();
            $work->cliente = $faker->name();
            $work->indirizzo_lavoro = $faker->address();
            $work->responsabile_lavoro = $faker->name();
            $work->materiali = $faker->word();
            $work->save();
        }
       
    }
}
