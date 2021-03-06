<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name', '=', 'admin')->firstOrFail();
        $gestor = Role::where('name', '=', 'gestor')->firstOrFail();
        $cliente = Role::where('name', '=', 'cliente')->firstOrFail();

        // New user
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@admin';
        $user->password = Hash::make('1234');
        //$user->save();
        $admin->users()->save($user);
        $user->role()->associate($admin)->save();
    }
}
