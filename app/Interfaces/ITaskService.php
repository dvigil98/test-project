<?php

namespace App\Interfaces;

interface ITaskService
{
    public function getTasks();
    public function getTasksByProject($project_id);
    public function saveTask($data);
    public function getTask($id);
    public function updateTask($data, $id);
    public function deleteTask($id);
}
