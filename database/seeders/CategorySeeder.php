<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['#Abbigliamento','#Animali','#Antiquariato','#Arredamento','#Elettronica','#Giocattoli','#Libri & Manga','#Motori','#Musica','#Nerdzone'];
        foreach($categories as $category){
            Category::create(['name'=>$category]);
        };
    }
}
