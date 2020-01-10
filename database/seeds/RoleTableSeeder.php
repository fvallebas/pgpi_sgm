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
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();

        $role = new Role();
        $role->name = 'Gestor';
        $role->description = 'User';
        $role->save();

        $role = new Role();
        $role->name = 'Cliente';
        $role->description = 'Cliente';
        $role->save();
    }
}
