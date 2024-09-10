<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Sistema de inventario y facturacion para Variedades Cesar',
                'description' => 'Sistema de inventario y facturacion para Variedades Cesar'
            ]
        ];

        foreach ($projects as $p) {
            $project = new Project();
            $project->name = $p['name'];
            $project->description = $p['description'];
            $project->save();
        }
    }
}
