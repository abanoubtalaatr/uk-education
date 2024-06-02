<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $collection = collect([
            'Role',
            'Permission',
            'User',
            "Tutor",
        ]);

        $collection->each(function ($item, $key) {
            // create permissions for each collection item
            Permission::create(['group' => $item, 'name' => 'viewAny' . $item, 'guard_name' => 'web']);
            Permission::create(['group' => $item, 'name' => 'view' . $item, 'guard_name' => 'web']);
            Permission::create(['group' => $item, 'name' => 'update' . $item, 'guard_name' => 'web']);
            Permission::create(['group' => $item, 'name' => 'create' . $item, 'guard_name' => 'web']);
            Permission::create(['group' => $item, 'name' => 'delete' . $item, 'guard_name' => 'web']);
            Permission::create(['group' => $item, 'name' => 'destroy' . $item, 'guard_name' => 'web']);
        });

        // Create a Super-Admin Role and assign all Permissions
        $role = Role::create([
            'name' => 'super-admin',
            'guard_name' => 'web',
        ]);

        $role->givePermissionTo(Permission::all());

        // User::factory()->create([
        //     'name' => 'abanoub',
        //     'email' => 'abanoub@tech.com',
        // ]);

        // Give User Super-Admin Role
        $user = User::whereEmail('abanoub@tech.com')->first(); // Change this to your email.
        $user->assignRole('super-admin');
    }
}
