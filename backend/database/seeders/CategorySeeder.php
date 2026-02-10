<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            ['name' => 'Húsos'],
            ['name' => 'Csirkés'],
            ['name' => 'Szalámis'],
            ['name' => 'Sonkás'],
            ['name' => 'Baconös'],
            ['name' => 'Halas'],
            ['name' => 'Vegetáriánus'],
            ['name' => 'Vegán'],
            ['name' => 'Sajtos'],
            ['name' => 'Extra sajtos'],
            ['name' => 'Gombás'],
            ['name' => 'Zöldséges'],
            ['name' => 'Gyümölcsös'],
            ['name' => 'Pikáns'],
            ['name' => 'Csípős'],
            ['name' => 'Extra csípős'],
            ['name' => 'BBQ'],
            ['name' => 'Magyaros'],
            ['name' => 'Olasz stílus'],
            ['name' => 'Amerikai stílus'],
            ['name' => 'Gluténmentes'],
        ]);
    }
}
