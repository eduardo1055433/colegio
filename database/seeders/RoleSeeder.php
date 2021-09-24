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
        //$role2 = Role::create(['name'=>'']);
         
        Permission::create(['name'=>'admin.home',
                            'description'=>'Ver el Dashboard'])->syncRoles([$role1]);

        //PERMISOS
        Permission::create(['name'=>'admin.users.index',
                            'description'=>'Ver el Listado de Usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.edit',
                            'description'=>'Asignar un Rol'])->syncRoles([$role1]);
        //USUARIOS
        Permission::create(['name'=>'admin.studentsuser.index',
                            'description'=>'Ver los studentsuser'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.studentsuser.create',
                            'description'=>'Agregar studentsuser'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.studentsuser.edit',
                            'description'=>'Editar studentsuser'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.studentsuser.destroy',
                            'description'=>'Eliminar studentsuser'])->syncRoles([$role1]);
        
        //ROLES
        Permission::create(['name'=>'admin.roles.index',
                            'description'=>'Ver los Roles'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.roles.create',
                            'description'=>'Agregar Roles'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.roles.edit',
                            'description'=>'Editar Roles'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.roles.destroy',
                            'description'=>'Eliminar Rol'])->syncRoles([$role1]);

        //course
        Permission::create(['name'=>'admin.course.index',
                            'description'=>'Ver los course'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.course.create',
                            'description'=>'Agregar course'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.course.edit',
                            'description'=>'Editar course'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.course.destroy',
                            'description'=>'Eliminar course'])->syncRoles([$role1]);

        //notes
        Permission::create(['name'=>'admin.notes.index',
                            'description'=>'Ver los notes'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.notes.create',
                            'description'=>'Agregar notes'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.notes.edit',
                            'description'=>'Editar notes'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.notes.destroy',
                            'description'=>'Eliminar notes'])->syncRoles([$role1]);


    }
}
