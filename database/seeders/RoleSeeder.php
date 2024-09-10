<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin',
                'description' => 'Funciones de rol administrador'
            ],
            [
                'name' => 'Usuario',
                'description' => 'Funciones de rol usuario normal'
            ],
        ];

        foreach ($roles as $r) {
            $role = new Role();
            $role->name = $r['name'];
            $role->description = $r['description'];
            $role->save();
        }
    }
}
