<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo('users_manage');
        $role->givePermissionTo('doctor_area');
        $role->givePermissionTo('patient_area');

        $role = Role::create(['name' => 'doctor']);
        $role->givePermissionTo('doctor_area');

        $role = Role::create(['name' => 'patient']);
        $role->givePermissionTo('patient_area');
    }
}
