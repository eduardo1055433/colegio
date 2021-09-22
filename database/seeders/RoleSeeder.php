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
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Students']);

        Permission::create(['name'=>'admin.home'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.edit'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.students.index'])->syncRoles([$role2]);
        Permission::create(['name'=>'admin.students.create'])->syncRoles([$role2]);
        Permission::create(['name'=>'admin.students.edit'])->syncRoles([$role2]);
        Permission::create(['name'=>'admin.students.destroy'])->syncRoles([$role2]);

    }
}
