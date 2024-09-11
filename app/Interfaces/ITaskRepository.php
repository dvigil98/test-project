<?php

namespace App\Interfaces;

use App\Models\Task;

interface ITaskRepository
{
    public function getAll();
    public function getByProject($project_id);
    public function saveOrUpdate(Task $task);
    public function getById($id);
    public function delete($id);
    public function getTotalsOfPendingTasks();
    public function getTotalsOfTasksInProcess();
    public function getTotalsOfTasksDone();
}
