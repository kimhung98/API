<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'makeup',
        ]);

        Category::create([
            'name' => 'lips',
        ]);

        Category::create([
            'name' => 'skincare',
        ]);

        Category::create([
            'name' => 'body care',
        ]);

        Category::create([
            'name' => 'hair',
        ]);

        Category::create([
            'name' => 'tools - brushes',
        ]);

        Category::create([
            'name' => 'perfume',
        ]);
    }
}
