<?php

namespace App\Http\Controllers;

use App\Interfaces\IProjectService;
use App\Interfaces\ITaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $taskService;
    private $projectService;

    public function __construct(
        ITaskService $taskService,
        IProjectService $projectService
    ) {
        $this->taskService = $taskService;
        $this->projectService = $projectService;
    }

    public function index($project_id)
    {
        $project = $this->projectService->getProject($project_id);
        $tasks = $this->taskService->getTasksByProject($project_id);
        return view('tasks/index', ['project' => $project, 'tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        if ($this->taskService->saveTask($request))
            return redirect('/projects/' . $request->project_id . '/tasks')->with('msgType', 'success')->with('msg', 'Datos guardados');
        else
            return redirect('/projects/' . $request->project_id . '/tasks')->with('msgType', 'error')->with('msg', 'Datos no guardados');
    }

    public function destroy($id)
    {
        $project_id = $this->taskService->getTask($id)->project_id;

        if ($this->taskService->deleteTask($id))
            return redirect('/projects/' . $project_id . '/tasks')->with('msgType', 'success')->with('msg', 'Datos guardados');
        else
            return redirect('/projects/' . $project_id . '/tasks')->with('msgType', 'success')->with('msg', 'Datos guardados');
    }

    public function update(Request $request)
    {


        $id = $request->get('id_edit');

        $data = (object) [
            'project_id' => $request->get('project_id'),
            'name' => $request->get('name_edit'),
            'description' => $request->get('description_edit'),
            'status' => $request->get('status_edit'),
        ];

        if ($this->taskService->updateTask($data, $id))
            return redirect('/projects/' . $request->project_id . '/tasks')->with('msgType', 'success')->with('msg', 'Datos actualizados');
        else
            return redirect('/projects/' . $request->project_id . '/tasks')->with('msgType', 'error')->with('msg', 'Datos no actualizados');
    }

    public function show($id)
    {
        $task = $this->taskService->getTask($id);
        return response()->json($task);
    }
}
