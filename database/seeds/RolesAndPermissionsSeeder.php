<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

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
        // this can be done as separate statements
        $role = Role::create(['name' => 'super']);
        Role::create(['name' => 'employee']);
        Role::create(['name' => 'employer']);
        $role->givePermissionTo(Permission::all());
    }
}
