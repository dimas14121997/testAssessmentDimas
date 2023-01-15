<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\role;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'UserSpv',
            'email'=> 'spv@gmail.com',
            'role' => 'Supervisor',
            'password' => bcrypt('123')
        ]);

        User::create([
            'username' => 'UserAdmin',
            'email'=> 'admin@gmail.com',
            'role' => 'Admin',
            'password' => bcrypt('123')
        ]);

        User::create([
            'username' => 'Vendor',
            'email'=> 'vendor@gmail.com',
            'role' => 'Vendor',
            'password' => bcrypt('123')
        ]);

        role::create([
            'role_name'=> 'Supervisor',
            'role_description' => 'spv@gmail.com',
        ]);

        role::create([
            'role_name'=> 'Admin',
            'role_description' => 'admin@gmail.com',
        ]);

        role::create([
            'role_name'=> 'Vendor',
            'role_description' => 'vendor@gmail.com',
        ]);
    }
}
