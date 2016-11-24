<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Administrador KRT',
                'display_name' => 'Admin',
                'description' => 'Acceso a todo'
            ],
            [
                'name' => 'Editor KRT',
                'display_name' => 'Editor',
                'description' => 'Solo puede editar noticias'
            ],
            [
                'name' => 'Cliente',
                'display_name' => 'Locatario',
                'description' => 'Acceso a su mantenedor'
            ],
            [
                'name' => 'Usuario KRT',
                'display_name' => 'Usuario',
                'description' => 'acceso a secciones de usuario'
            ]
        ];
        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
