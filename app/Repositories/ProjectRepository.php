<?php

namespace App\Repositories;

use App\Interfaces\IProjectRepository;
use App\Models\Project;

class ProjectRepository implements IProjectRepository
{
    public function getAll()
    {
        $projects = Project::all();
        return $projects;
    }

    public function saveOrUpdate(Project $project)
    {
        return $project->save();
    }

    public function getById($id)
    {
        $project = Project::find($id);
        return $project;
    }

    public function delete($id)
    {
        return Project::find($id)->delete();
    }
}
