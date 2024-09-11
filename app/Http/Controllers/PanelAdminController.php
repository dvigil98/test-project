<?php

namespace App\Http\Controllers;

use App\Interfaces\IProjectService;
use App\Interfaces\ITaskService;
use Illuminate\Http\Request;

class PanelAdminController extends Controller
{
    private $projectService;
    private $taskService;

    public function __construct(
        IProjectService $projectService,
        ITaskService $taskService
    ) {
        $this->projectService = $projectService;
        $this->taskService = $taskService;
    }

    public function panel()
    {
        $nProjects = $this->projectService->getTotalOfRegisteredProjects();
        $nPendingTasks = $this->taskService->getTotalsOfPendingTasks();
        $nTasksInProcess = $this->taskService->getTotalsOfTasksInProcess();
        $nTasksDone = $this->taskService->getTotalsOfTasksDone();
        return view('panel-admin/panel', [
            'nProjects' => $nProjects,
            'nPendingTasks' => $nPendingTasks,
            'nTasksInProcess' => $nTasksInProcess,
            'nTasksDone' => $nTasksDone,
        ]);
    }
}
