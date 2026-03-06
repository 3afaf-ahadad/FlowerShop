<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    
    public function run(): void
    {
        $mariage = Category::create(['nom' => 'Mariage', 'slug' => 'mariage']);
        $romantique = Category::create(['nom' => 'Romantique', 'slug' => 'romantique']);

        Product::create([
            'nom' => 'Rose Poudrée',
            'slug' => 'rose-poudree',
            'description' => 'Un bouquet élégant de roses roses pâles, parfait pour un mariage chic.',
            'prix' => 45.00,
            'stock' => 15,
            'image' => 'rose_poudree.jpg',
            'categorie_id' => $mariage->id,
        ]);

        Product::create([
            'nom' => 'Pivoine Royale',
            'slug' => 'pivoine-royale',
            'description' => 'La reine des fleurs dans une teinte rose fuchsia éclatante.',
            'prix' => 60.00,
            'stock' => 8,
            'image' => 'pivoine_royale.jpg',
            'categorie_id' => $romantique->id,
        ]);

        Product::create([
            'nom' => 'Bouquet Éclat de Rose',
            'slug' => 'eclat-de-rose',
            'description' => 'Notre signature : un mélange de roses et de fleurs blanches.',
            'prix' => 55.00,
            'stock' => 10,
            'image' => 'eclat_rose.jpg',
            'categorie_id' => $mariage->id,
        ]);
    }
}
