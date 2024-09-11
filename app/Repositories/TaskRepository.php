<?php

namespace App\Repositories;

use App\Interfaces\ITaskRepository;
use App\Models\Task;

class TaskRepository implements ITaskRepository
{
    public function getAll()
    {
        $tasks = Task::all();
        return $tasks;
    }

    public function getByProject($project_id)
    {
        $tasks = Task::where('project_id', $project_id)->get();
        return $tasks;
    }

    public function saveOrUpdate(Task $task)
    {
        return $task->save();
    }

    public function getById($id)
    {
        $task = Task::find($id);
        return $task;
    }

    public function delete($id)
    {
        return Task::find($id)->delete();
    }
}
