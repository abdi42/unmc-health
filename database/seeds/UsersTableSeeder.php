<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();

        $admin = new User();
        $admin->name = env('ADMIN_USERNAME');
        $admin->email = env('ADMIN_EMAIL');
        $admin->pending_invite = false;
        $admin->role_id = $role_admin->id;
        $admin->password = bcrypt(env('ADMIN_PASSWORD'));
        $admin->remember_token = str_random(10);
        $admin->save();
    }
}
