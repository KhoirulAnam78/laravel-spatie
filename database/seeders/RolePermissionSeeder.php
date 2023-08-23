<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'add-user',]);
        Permission::create(['name' => 'edit-user',]);
        Permission::create(['name' => 'read-user',]);
        Permission::create(['name' => 'delete-user',]);
        Permission::create(['name' => 'add-article',]);
        Permission::create(['name' => 'edit-article',]);
        Permission::create(['name' => 'delete-article',]);
        Permission::create(['name' => 'read-article',]);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'writer']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo(['add-user', 'edit-user', 'read-user', 'delete-user']);


        $roleWriter = Role::findByName('writer');
        $roleWriter->givePermissionTo(['add-article', 'edit-article', 'read-article', 'delete-article']);
    }
}
