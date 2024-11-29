<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
          ['name'=>'Super Admin'],
          ['name'=>'Auther'],
          ['name'=>'Editor'] 
        ]);
    }
}
