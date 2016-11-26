<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name_tag' => 'Pizzeria',
            ],
            [
                'name_tag' => 'Comedia China',
            ],
            [
                'name_tag' => 'Comedia Peruana',
            ],
            [
                'name_tag' => 'Comedia Exótica',
            ],
            [
                'name_tag' => 'Comedia Mar',
            ],
            [
                'name_tag' => 'Comedia Italiana',
            ],
            [
                'name_tag' => 'Parrilladas',
            ],
            [
                'name_tag' => 'Sushi',
            ],
            [
                'name_tag' => 'Eventos',
            ],
            [
                'name_tag' => 'Ofertas',
            ],
            [
                'name_tag' => 'bailar',
            ],
            [
                'name_tag' => 'fastfood',
            ],
            [
                'name_tag' => 'Pub Restobar',
            ],
            [
                'name_tag' => 'Pub Joven',
            ],[
                'name_tag' => 'Pub Adulto',
            ],
            [
                'name_tag' => 'Eventos Culturales',
            ],
            [
                'name_tag' => 'Eventos Deportivos',
            ],
            [
                'name_tag' => 'Promociones',
            ],
            [
                'name_tag' => 'Alcohol',
            ]
        ];
        foreach ($tags as $key => $value) {
            Tag::create($value);
        }
    }
}
