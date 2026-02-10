<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;
use App\Models\Category;

class PizzaSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all()->keyBy('name');

        $pizzas = [
            [
                'name' => 'Nigiri Lazacos Pizza',
                'description' => 'Rizsalap, krémsajt, nigiri lazac, wasabi',
                'price' => 3990,
                'image_url' => 'https://i.ibb.co/rGrPRvTc/bg-logo.png',
                'categories' => [
                    'Halas',
                    'Sajtos',
                    'Extra csípős',
                ],
            ],
            [
                'name' => 'Margherita',
                'description' => 'Paradicsom, mozzarella',
                'price' => 2790,
                'image_url' => 'https://i.ibb.co/rGrPRvTc/bg-logo.png',
                'categories' => [
                    'Sajtos',
                    'Vegetáriánus',
                    'Olasz stílus',
                ],
            ],
            [
                'name' => 'Pepperoni',
                'description' => 'Paradicsom, mozzarella, pepperoni',
                'price' => 3190,
                'image_url' => 'https://i.ibb.co/rGrPRvTc/bg-logo.png',
                'categories' => [
                    'Szalámis',
                    'Sajtos',
                    'Pikáns',
                    'Amerikai stílus',
                ],
            ],
            [
                'name' => 'Sonkás',
                'description' => 'Paradicsom, mozzarella, sonka',
                'price' => 2990,
                'image_url' => 'https://i.ibb.co/rGrPRvTc/bg-logo.png',
                'categories' => [
                    'Sonkás',
                    'Sajtos',
                ],
            ],
            [
                'name' => 'Hawaii',
                'description' => 'Paradicsom, mozzarella, sonka, ananász',
                'price' => 3290,
                'image_url' => 'https://i.ibb.co/rGrPRvTc/bg-logo.png',
                'categories' => [
                    'Sonkás',
                    'Sajtos',
                    'Gyümölcsös',
                ],
            ],
            [
                'name' => 'BBQ Csirkés',
                'description' => 'BBQ szósz, mozzarella, csirke',
                'price' => 3390,
                'image_url' => 'https://i.ibb.co/rGrPRvTc/bg-logo.png',
                'categories' => [
                    'Húsos',
                    'Csirkés',
                    'BBQ',
                    'Sajtos',
                    'Amerikai stílus',
                ],
            ],
            [
                'name' => 'Magyaros',
                'description' => 'Paradicsom, mozzarella, kolbász, hagyma',
                'price' => 3390,
                'image_url' => 'https://i.ibb.co/rGrPRvTc/bg-logo.png',
                'categories' => [
                    'Magyaros',
                    'Húsos',
                    'Sajtos',
                    'Zöldséges',
                    'Csípős',
                ],
            ],
            [
                'name' => 'Négysajtos',
                'description' => 'Mozzarella, gorgonzola, parmezán, edami',
                'price' => 3490,
                'image_url' => 'https://i.ibb.co/rGrPRvTc/bg-logo.png',
                'categories' => [
                    'Extra sajtos',
                    'Vegetáriánus',
                    'Olasz stílus',
                ],
            ],
            [
                'name' => 'Gombás',
                'description' => 'Paradicsom, mozzarella, gomba',
                'price' => 3190,
                'image_url' => 'https://i.ibb.co/rGrPRvTc/bg-logo.png',
                'categories' => [
                    'Zöldséges',
                    'Gombás',
                    'Vegetáriánus',
                    'Sajtos',
                ],
            ],
            [
                'name' => 'Vegetáriánus',
                'description' => 'Paradicsom, mozzarella, zöldségek',
                'price' => 3190,
                'image_url' => 'https://i.ibb.co/rGrPRvTc/bg-logo.png',
                'categories' => [
                    'Vegetáriánus',
                    'Sajtos',
                    'Zöldséges',
                ],
            ],
            [
                'name' => 'Vegán Deluxe',
                'description' => 'Paradicsom, vegán sajt, zöldségek',
                'price' => 3290,
                'image_url' => 'https://i.ibb.co/rGrPRvTc/bg-logo.png',
                'categories' => [
                    'Vegán',
                    'Sajtos',
                    'Zöldséges',
                ],
            ],
            [
                'name' => 'Tenger Gyümölcsei',
                'description' => 'Paradicsom, mozzarella, tengeri mix',
                'price' => 3790,
                'image_url' => 'https://i.ibb.co/rGrPRvTc/bg-logo.png',
                'categories' => [
                    'Halas',
                    'Húsos',
                    'Sajtos',
                ],
            ],
        ];

        foreach ($pizzas as $data) {
            $pizza = Pizza::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'image_url' => $data['image_url'],
            ]);

            $pizza->categories()->attach(
                collect($data['categories'])
                    ->map(fn($name) => $categories[$name]->id ?? null)
                    ->filter()
                    ->toArray()
            );
        }
    }
}
