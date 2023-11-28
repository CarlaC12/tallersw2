<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=> 'administrador']);
        $role2 = Role::create(['name'=> 'mecanico']);
        $role3 = Role::create(['name'=> 'cliente']);

        Permission::create(['name' => 'gestionar usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar mecanico'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar auto'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar reserva'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar inventario'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar orden repuesto'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar orden de trabajo'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar cotizacion'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar factura'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar metodo de pago'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'Dashboard'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Reserva'])->syncRoles([$role3]);
        Permission::create(['name' => 'Perfil'])->syncRoles([$role3]);
        Permission::create(['name' => 'Sesion'])->syncRoles([$role1,$role2,$role3]);
    }
}
