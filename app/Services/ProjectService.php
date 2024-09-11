<?php

namespace App\Services;

use App\Interfaces\IProjectService;
use App\Interfaces\IProjectRepository;
use App\Models\Project;

class ProjectService implements IProjectService
{
    private $projectRepository;

    public function __construct(IProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function getProjects()
    {
        try {
            $projects = $this->projectRepository->getAll();
            return $projects;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function saveProject($data)
    {
        try {
            $project = new Project();
            $project->name = $data->name;
            $project->description = $data->description;
            if ($this->projectRepository->saveOrUpdate($project))
                return true;
            return false;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function getProject($id)
    {
        try {
            $project = $this->projectRepository->getById($id);
            return $project;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function updateProject($data, $id)
    {
        try {
            $project = $this->projectRepository->getById($id);
            $project->name = $data->name;
            $project->description = $data->description;
            if ($this->projectRepository->saveOrUpdate($project))
                return true;
            return false;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function deleteProject($id)
    {
        try {
            if ($this->projectRepository->delete($id))
                return true;
            return false;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function getTotalOfRegisteredProjects()
    {
        try {
            $nProjects = $this->projectRepository->getTotalOfRegisteredProjects();
            return $nProjects;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
