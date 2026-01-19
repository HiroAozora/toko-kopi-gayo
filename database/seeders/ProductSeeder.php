<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Ensure storage directory exists
        $storagePath = storage_path('app/public/products');
        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath, 0755, true);
        }

        // 2. Prepare Dummy Image
        // Copy public/kopi-default.jpeg to storage/app/public/products/sample-kopi.jpeg for seeding
        $sourceImage = public_path('kopi-default.jpeg');
        $targetImageName = 'sample-kopi.jpeg';
        $targetImagePath = $storagePath . '/' . $targetImageName;

        if (File::exists($sourceImage)) {
            File::copy($sourceImage, $targetImagePath);
        } else {
            // Fallback if kopi-default.jpeg is missing
        }

        // 3. Get Categories
        $arabica = Category::where('slug', 'arabica-gayo')->first();
        $robusta = Category::where('slug', 'robusta-gayo')->first();
        $wine = Category::where('slug', 'wine-coffee-gayo')->first();
        $luwak = Category::where('slug', 'luwak-gayo')->first();
        $peaberry = Category::where('slug', 'peaberry-gayo')->first();

        // 4. Create Products
        $products = [
            [
                'name' => 'Arabica Gayo Premium',
                'description' => 'Kopi Arabica Gayo dengan cita rasa asam segar buah-buahan dan aroma rempah yang khas. Dipetik dari dataran tinggi Aceh Tengah.',
                'price' => 120000,
                'stock' => 50,
                'category_id' => $arabica->id ?? null,
                'image' => 'products/' . $targetImageName,
            ],
            [
                'name' => 'Robusta Gayo Dark Roast',
                'description' => 'Kopi Robusta pilihan dengan body tebal dan rasa coklat pahit yang nikmat. Cocok untuk penyuka kopi strong atau campuran susu.',
                'price' => 85000,
                'stock' => 100,
                'category_id' => $robusta->id ?? null,
                'image' => 'products/' . $targetImageName,
            ],
            [
                'name' => 'Gayo Wine Coffee',
                'description' => 'Kopi hasil fermentasi alami dalam buah kopi (cherry) yang menghasilkan aroma dan rasa menyerupai wine tanpa alkohol.',
                'price' => 250000,
                'stock' => 15,
                'category_id' => $wine->id ?? null,
                'image' => 'products/' . $targetImageName,
            ],
            [
                'name' => 'Kopi Luwak Liar Gayo',
                'description' => 'Kopi eksklusif dari luwak liar di hutan Gayo. Memiliki rasa yang sangat halus dan aftertaste yang panjang.',
                'price' => 500000,
                'stock' => 5,
                'category_id' => $luwak->id ?? null,
                'image' => 'products/' . $targetImageName,
            ],
             [
                'name' => 'Peaberry (Kopi Lanang)',
                'description' => 'Biji kopi tunggal (monokotil) yang langka. Memiliki rasa yang lebih bulat dan padat dibandingkan biji kopi biasa.',
                'price' => 150000,
                'stock' => 25,
                'category_id' => $peaberry->id ?? null,
                'image' => 'products/' . $targetImageName,
            ],
        ];

        foreach ($products as $data) {
            if ($data['category_id']) {
                $data['slug'] = Str::slug($data['name']);
                Product::create($data);
            }
        }
    }
}
