<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

        // this can be done as separate statements\
        // List Daftar Role ( Berdasarkan List Level di users )
        $role = Role::create(['name' => 'superadmin']);
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'guru']);
        $role = Role::create(['name' => 'perusahaan']);
        $role = Role::create(['name' => 'siswa']);

        // List Daftar Role ( Berdasarkan List Level di users )
        $permissions = Permission::create(['name' => 'melakukan verifikasi']);
        $permissions = Permission::create(['name' => 'menunggu verifikasi diterima']);
        $permissions = Permission::create(['name' => 'terverifikasi']);
    }
}
