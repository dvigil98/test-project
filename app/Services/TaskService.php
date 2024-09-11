<?php

namespace App\Services;

use App\Interfaces\ITaskService;
use App\Interfaces\ITaskRepository;
use App\Models\Task;

class TaskService implements ITaskService
{
    private $taskRepository;

    public function __construct(ITaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getTasks()
    {
        try {
            $tasks = $this->taskRepository->getAll();
            return $tasks;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function getTasksByProject($project_id)
    {
        try {
            $tasks = $this->taskRepository->getByProject($project_id);
            return $tasks;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function saveTask($data)
    {
        try {
            $task = new Task();
            $task->project_id = $data->project_id;
            $task->name = $data->name;
            $task->description = $data->description;
            $task->status = 'Pendiente';
            if ($this->taskRepository->saveOrUpdate($task))
                return true;
            return false;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function getTask($id)
    {
        try {
            $task = $this->taskRepository->getById($id);
            return $task;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function updateTask($data, $id)
    {
        try {
            $task = $this->taskRepository->getById($id);
            $task->project_id = $data->project_id;
            $task->name = $data->name;
            $task->description = $data->description;
            $task->status = $data->status;
            if ($this->taskRepository->saveOrUpdate($task))
                return true;
            return false;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function deleteTask($id)
    {
        try {
            if ($this->taskRepository->delete($id))
                return true;
            return false;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
