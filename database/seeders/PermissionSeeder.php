<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::updateOrCreate(['name'=>'create-users'],['name'=>'create-users', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'create-users'],['name'=>'read-users', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'create-users'],['name'=>'edit-users', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'create-users'],['name'=>'delete-users', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-sliders'],['name'=>'create-sliders', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-sliders'],['name'=>'read-sliders', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-sliders'],['name'=>'edit-sliders', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-sliders'],['name'=>'delete-sliders', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-settings'],['name'=>'create-settings', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-settings'],['name'=>'read-settings', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-settings'],['name'=>'edit-settings', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-settings'],['name'=>'delete-settings', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-services'],['name'=>'create-services', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-services'],['name'=>'read-services', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-services'],['name'=>'edit-services', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-services'],['name'=>'delete-services', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-categories'],['name'=>'create-categories', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-categories'],['name'=>'read-categories', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-categories'],['name'=>'edit-categories', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-categories'],['name'=>'delete-categories', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-jobs'],['name'=>'create-jobs', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-jobs'],['name'=>'read-jobs', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-jobs'],['name'=>'edit-jobs', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-jobs'],['name'=>'delete-jobs', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-opinions'],['name'=>'create-opinions', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-opinions'],['name'=>'read-opinions', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-opinions'],['name'=>'edit-opinions', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-opinions'],['name'=>'delete-opinions', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-blogs'],['name'=>'create-blogs', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-blogs'],['name'=>'read-blogs', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-blogs'],['name'=>'edit-blogs', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-blogs'],['name'=>'delete-blogs', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-social-media'],['name'=>'create-social-media', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-social-media'],['name'=>'read-social-media', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-social-media'],['name'=>'edit-social-media', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-social-media'],['name'=>'delete-social-media', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-permissions'],['name'=>'create-permissions', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-permissions'],['name'=>'read-permissions', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-permissions'],['name'=>'edit-permissions', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-permissions'],['name'=>'delete-permissions', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-roles'],['name'=>'create-roles', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-roles'],['name'=>'read-roles', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-roles'],['name'=>'edit-roles', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-roles'],['name'=>'delete-roles', 'guard_name' => 'user']);
    }
}
