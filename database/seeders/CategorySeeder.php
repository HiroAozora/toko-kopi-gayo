<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Arabica Gayo', 'description' => 'Kopi Arabica asli dari dataran tinggi Gayo.'],
            ['name' => 'Robusta Gayo', 'description' => 'Kopi Robusta dengan cita rasa kuat.'],
            ['name' => 'House Blend', 'description' => 'Campuran spesial racikan Gayo Origin.'],
            ['name' => 'Green Bean', 'description' => 'Biji kopi mentah berkualitas ekspor.'],
            ['name' => 'Bubuk Kopi', 'description' => 'Kopi siap seduh penggugah semangat.'],
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat['name'],
                'slug' => Str::slug($cat['name']),
                'description' => $cat['description'],
            ]);
        }
    }
}
