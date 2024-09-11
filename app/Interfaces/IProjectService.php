<?php

namespace App\Interfaces;

interface IProjectService
{
    public function getProjects();
    public function saveProject($data);
    public function getProject($id);
    public function updateProject($data, $id);
    public function deleteProject($id);
    public function getTotalOfRegisteredProjects();
}
