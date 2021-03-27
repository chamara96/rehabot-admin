<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            // 'nic' => 96321,
            'password' => bcrypt('password')
        ]);
        $user->assignRole('administrator');

    }
}
