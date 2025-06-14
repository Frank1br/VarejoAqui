<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $categorias = [
        ['name' => 'Alimentos', 'slug' => 'alimentos'],
        ['name' => 'Artesanato', 'slug' => 'artesanato'],
        ['name' => 'Roupas', 'slug' => 'roupas'],
        ['name' => 'Beleza', 'slug' => 'beleza'],
    ];

    foreach ($categorias as $cat) {
        Category::create($cat);
    }
}
}
