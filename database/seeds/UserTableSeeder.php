<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Models\News;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         DB::table('users')->insert([
             'nickname'=>'Andres87',
             'first_name'=>'Andrés',
             'Last_name'=>'Jara Henríquez',
             'email'=>'andresjarah@gmail.com',
             'password'=>'$10$ec7LJZlvjLE5pd3rqisBcOHXW.fJm6qJMsSYKzVkuG6Nl6Hqcqulu'
         ]);
     /*
     pass = andres1987

     App\User::create([
          	'name'=>'andrés'
          	]);
       //   	Factory(App\User::class, 49)->create();
      /*    	Factory(App\User::class)->create([
                'first_name'=>'Andres',
                'last_name'=>'Jara',
                'email'=>'andresjarah@gmail.com',
                'role'=>'admin'

          		]);*/
    }
}
