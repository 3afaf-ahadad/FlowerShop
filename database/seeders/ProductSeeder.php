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

       $collection = Category::create(['nom' => 'Collection', 'slug' => 'collection']);

        Product::create([
            'nom' => 'Rose Poudrée',
            'slug' => 'rose-poudree',
            'description' => 'Un bouquet élégant de roses roses pâles, parfait pour un mariage chic.',
            'prix' => 45.00,
            'stock' => 15,
            'image' => 'products/rose_poudree.jpg',
            'categorie_id' => $mariage->id,
        ]);

        Product::create([
            'nom' => 'Pivoine Royale',
            'slug' => 'pivoine-royale',
            'description' => 'La reine des fleurs dans une teinte rose fuchsia éclatante.',
            'prix' => 60.00,
            'stock' => 8,
            'image' => 'products/pivoine_royale.jpg',
            'categorie_id' => $romantique->id,
        ]);

        Product::create([
            'nom' => 'Bouquet Éclat de Rose',
            'slug' => 'eclat-de-rose',
            'description' => 'Notre signature : un mélange de roses et de fleurs blanches.',
            'prix' => 55.00,
            'stock' => 10,
            'image' => 'products/eclat_rose.jpg',
            'categorie_id' => $mariage->id,
        ]);


        Product::create([
            'nom' => 'Elegant Ivory Tulips',
            'slug' => Str::slug('Elegant Ivory Tulips'),
            'description' => 'A bundle of elegant Ivory Tulips.',
            'prix' => 120.00,
            'stock' => 15,
            'image' => 'products/ivory_tulips.jpg',
            'categorie_id' => $collection->id,
        ]);

        Product::create([
            'nom' => 'Rustic Blue Hydrangeas',
            'slug' => Str::slug('Rustic Blue Hydrangeas'),
            'description' => 'A rustic arrangement of Blue Hydrangeas.',
            'prix' => 150.00,
            'stock' => 10,
            'image' => 'products/blue_hydrangeas.jpg',
            'categorie_id' => $collection->id,
        ]);

        Product::create([
            'nom' => 'Modern Succulents & Eucalyptus',
            'slug' => Str::slug('Modern Succulents & Eucalyptus'),
            'description' => 'A modern bouquet of mixed Succulents & Eucalyptus.',
            'prix' => 200.00,
            'stock' => 8,
            'image' => 'products/succulents_eucalyptus.jpg',
            'categorie_id' => $collection->id,
        ]);

        Product::create([
            'nom' => 'Sunflower Cluster',
            'slug' => Str::slug('Sunflower Cluster'),
            'description' => 'A bright cluster of Sunflower petals.',
            'prix' => 90.00,
            'stock' => 20,
            'image' => 'products/sunflowers.jpg',
            'categorie_id' => $collection->id,
        ]);

        Product::create([
            'nom' => 'Lavender & Baby\'s Breath',
            'slug' => Str::slug('Lavender & Baby Breath'),
            'description' => 'A soft bunch of purple Lavender & Baby\'s Breath.',
            'prix' => 110.00,
            'stock' => 25,
            'image' => 'products/lavender_babys_breath.jpg',
            'categorie_id' => $collection->id,
        ]);

        Product::create([
            'nom' => 'Minimalist White Orchid',
            'slug' => Str::slug('Minimalist White Orchid'),
            'description' => 'A minimalist stem of a white Orchid.',
            'prix' => 300.00,
            'stock' => 5,
            'image' => 'products/white_orchid.jpg',
            'categorie_id' => $collection->id,
        ]);

        Product::create([
            'nom' => 'Dark Red Ranunculus',
            'slug' => Str::slug('Dark Red Ranunculus'),
            'description' => 'A complex bouquet of dark red Ranunculus.',
            'prix' => 180.00,
            'stock' => 12,
            'image' => 'products/red_ranunculus.jpg',
            'categorie_id' => $collection->id,
        ]);

        Product::create([
            'nom' => 'Multi-colored Gerbera Daisies',
            'slug' => Str::slug('Multi colored Gerbera Daisies'),
            'description' => 'A cheerful mix of multi-colored Gerbera Daisies.',
            'prix' => 85.00,
            'stock' => 30,
            'image' => 'products/gerbera_daisies.jpg',
            'categorie_id' => $collection->id,
        ]);

        Product::create([
            'nom' => 'Cherry Blossoms',
            'slug' => Str::slug('Cherry Blossoms'),
            'description' => 'A stylized branch of Cherry Blossoms.',
            'prix' => 250.00,
            'stock' => 7,
            'image' => 'products/cherry_blossoms.jpg',
            'categorie_id' => $collection->id,
        ]);
    }
}
