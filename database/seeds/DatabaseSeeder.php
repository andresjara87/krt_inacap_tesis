<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();
        $this->call('PermissionTableSeeder');
        $this->call('RoleTableSeeder');
        $this->call('TagTableSeeder');
    	Model::reguard();
        // $this->call(UsersTableSeeder::class);
    }
}
