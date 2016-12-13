<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Admin')->first();
        $admin =new User();
        $admin->first_name = 'Admin';
        $admin->last_name = 'Now';
        $admin->email = 'admin@rindex.dk';
        $admin->phone = '55555555';
        $admin->password = bcrypt('kronos');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
