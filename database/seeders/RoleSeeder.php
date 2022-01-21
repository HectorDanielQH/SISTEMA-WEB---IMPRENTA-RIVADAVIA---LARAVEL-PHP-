<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        $role1=Role::create(['name'=>'admin']);
        $role2=Role::create(['name'=>'encargado']);
        $role3=Role::create(['name'=>'cliente']);

        Permission::create(['name'=>'admin.home'])->assignRole($role1);
        Permission::create(['name'=>'encargado.home'])->assignRole($role2);
        Permission::create(['name'=>'cliente.home'])->assignRole($role3);
        //Permission::create(['name'=>'home']);
        //Permission::create(['name'=>'home']);
        //Permission::create(['name'=>'home']);
    }
}
