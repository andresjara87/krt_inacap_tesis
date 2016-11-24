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
                'name_tag' => 'Comida Internacional',
            ],
            [
                'name_tag' => 'Comedia',
            ],
            [
                'name_tag' => 'Eventos',
            ],
            [
                'name_tag' => 'Ofertas',
            ]
        ];
        foreach ($tags as $key => $value) {
            Tag::create($value);
        }
    }
}
