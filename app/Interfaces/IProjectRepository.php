<?php

namespace App\Interfaces;

use App\Models\Project;

interface IProjectRepository
{
    public function getAll();
    public function saveOrUpdate(Project $project);
    public function getById($id);
    public function delete($id);
    public function getTotalOfRegisteredProjects();
}
