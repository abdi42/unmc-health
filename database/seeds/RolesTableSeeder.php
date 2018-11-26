<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->save();

        $role_instructor = new Role();
        $role_instructor->name = 'instructor';
        $role_instructor->save();

        $role_reporter = new Role();
        $role_reporter->name = 'reporter';
        $role_reporter->save();
    }
}
