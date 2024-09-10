<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'project_id' => 1,
                'name' => 'Modulo de inventario',
                'description' => 'Poder realizar consulta de inventario, cargas, descargas y ajustes de inventario',
                'status' => 'Pendiente'
            ],
            [
                'project_id' => 1,
                'name' => 'Modulo de compras',
                'description' => 'Poder realizar la gestion de proveedores y compras',
                'status' => 'Pendiente'
            ],
            [
                'project_id' => 1,
                'name' => 'Modulo de ventas',
                'description' => 'Poder realizar la gestion de clientes y ventas',
                'status' => 'Pendiente'
            ],
        ];

        foreach ($tasks as $t) {
            $task = new Task();
            $task->project_id = $t['project_id'];
            $task->name = $t['name'];
            $task->description = $t['description'];
            $task->status = $t['status'];
            $task->save();
        }
    }
}
