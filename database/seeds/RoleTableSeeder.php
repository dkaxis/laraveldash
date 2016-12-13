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
        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->description = 'Normal User';
        $role_user->save();

        $role_superuser = new Role();
        $role_superuser->name = 'Superuser';
        $role_superuser->description = 'Super User';
        $role_superuser->save();

        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'Administrator';
        $role_admin->save();
    }
}
