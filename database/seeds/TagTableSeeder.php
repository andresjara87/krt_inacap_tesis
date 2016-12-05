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
                'name_obj' => 'pizzeria',
            ],
            [
                'name_tag' => 'Comedia China',
                'name_obj' => 'comidaChina',
            ],
            [
                'name_tag' => 'Comedia Peruana',
                'name_obj' => 'comidaPeruana',
            ],
            [
                'name_tag' => 'Comedia Exótica',
                'name_obj' => 'comidaExotica',
            ],
            [
                'name_tag' => 'Comedia Mar',
                'name_obj' => 'comidaMar',
            ],
            [
                'name_tag' => 'Comedia Italiana',
                'name_obj' => 'comidaItaliana',
            ],
            [
                'name_tag' => 'Parrilladas',
                'name_obj' => 'parrilladas',
            ],
            [
                'name_tag' => 'Sushi',
                'name_obj' => 'sushi',
            ],
            [
                'name_tag' => 'Eventos',
                'name_obj' => 'eventos',
            ],
            [
                'name_tag' => 'Ofertas',
                'name_obj' => 'ofertas',
            ],
            [
                'name_tag' => 'Bailar',
                'name_obj' => 'bailar',
            ],
            [
                'name_tag' => 'fastfood',
                'name_obj' => 'fastfood',
            ],
            [
                'name_tag' => 'Pub Restobar',
                'name_obj' => 'pubRestobar',
            ],
            [
                'name_tag' => 'Pub Joven',
                'name_obj' => 'pubJoven',
            ],[
                'name_tag' => 'Pub Adulto',
                'name_obj' => 'pubAdulto',
            ],
            [
                'name_tag' => 'Eventos Culturales',
                'name_obj' => 'eventosCulturales',
            ],
            [
                'name_tag' => 'Eventos Deportivos',
                'name_obj' => 'eventosDeportivos',
            ],
            [
                'name_tag' => 'Promociones',
                'name_obj' => 'promociones',
            ],
            [
                'name_tag' => 'Alcohol',
                'name_obj' => 'alcohol',
            ]
        ];
        foreach ($tags as $key => $value) {
            Tag::create($value);
        }
    }
}
