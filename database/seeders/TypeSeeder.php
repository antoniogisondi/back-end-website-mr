<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5; $i++) { 
            $type = new Type();
            $type->nome_tipologia = $faker->sentence(4);
            $type->slug = Type::generateSlug($type->nome_tipologia);
            $type->descrizione = $faker->paragraph(4);
            $type->save();
        }
    }
}
