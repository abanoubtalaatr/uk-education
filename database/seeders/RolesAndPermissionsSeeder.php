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
            "Calendar",
            "MockExam",
            "Subscription",
            "Course",
            "CrashCourse",
            "BankScenario",
            "Testimonial",
            "Scenario",
            "NewsLetter",
            "Page",
            "Contact",
            "Topic",
            "Setting",
            "Slider",
            "Testimonial",
            "Calendar"
        ]);

        $collection->each(function ($item, $key) {
            // create permissions for each collection item
            Permission::updateOrCreate(['group' => $item, 'name' => 'viewAny' . $item, 'guard_name' => 'web'], ['name' => 'viewAny' . $item]);
            Permission::updateOrCreate(['group' => $item, 'name' => 'view' . $item, 'guard_name' => 'web'], ['name' => 'view' . $item]);
            Permission::updateOrCreate(['group' => $item, 'name' => 'update' . $item, 'guard_name' => 'web'], ['name' => 'update' . $item]);
            Permission::updateOrCreate(['group' => $item, 'name' => 'create' . $item, 'guard_name' => 'web'], ['name' => 'create' . $item]);
            Permission::updateOrCreate(['group' => $item, 'name' => 'delete' . $item, 'guard_name' => 'web'], ['name' => 'delete' . $item]);
            Permission::updateOrCreate(['group' => $item, 'name' => 'destroy' . $item, 'guard_name' => 'web'], ['name' => 'destroy' . $item]);
        });

        // Create a Super-Admin Role and assign all Permissions
        $role = Role::updateOrCreate([
            'name' => 'super-admin',
            'guard_name' => 'web',
        ], ['name' => 'super-admin']);

        $role->givePermissionTo(Permission::all());

        // User::factory()->create([
        //     'name' => 'abanoub',
        //     'email' => 'abanoub@tech.com',
        // ]);

        // Give User Super-Admin Role
        $user = User::whereEmail('abanoub@digital-vision-solutions')->first(); // Change this to your email.
        $user->assignRole('super-admin');
    }
}
