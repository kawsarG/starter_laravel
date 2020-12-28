<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //dashboard module
        $moduleAppDashboard = Module::updateOrCreate(['name'=>'Admin Dashboard']);
        //dashboard permission
        Permission::updateOrCreate([
            'module_id'=>$moduleAppDashboard->id,
            'name'=>'Access Dashboard',
            'slug'=>'app.dashboard'
        ]);
        //role module
        $moduleAppRole = Module::updateOrCreate(['name'=>'Role Management']);
        //role permission
        Permission::updateOrCreate([
            'module_id'=>$moduleAppRole->id,
            'name'=>'Access Role',
            'slug'=>'app.roles.index'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppRole->id,
            'name'=>'Create Role',
            'slug'=>'app.roles.create'
        ]);

        Permission::updateOrCreate([
            'module_id'=>$moduleAppRole->id,
            'name'=>'Edit Role',
            'slug'=>'app.roles.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppRole->id,
            'name'=>'Delete Role',
            'slug'=>'app.roles.destroy'
        ]);

        
        //user module
        
         $moduleAppUser = Module::updateOrCreate(['name'=>'User Management']);
         //user permission
         Permission::updateOrCreate([
             'module_id'=>$moduleAppUser->id,
             'name'=>'Access User',
             'slug'=>'app.users.index'
         ]);
         Permission::updateOrCreate([
             'module_id'=>$moduleAppUser->id,
             'name'=>'Create User',
             'slug'=>'app.users.create'
         ]);
 
         Permission::updateOrCreate([
             'module_id'=>$moduleAppUser->id,
             'name'=>'Edit User',
             'slug'=>'app.users.edit'
         ]);
         Permission::updateOrCreate([
             'module_id'=>$moduleAppUser->id,
             'name'=>'Delete User',
             'slug'=>'app.users.destroy'
         ]);
 
        
    }
}