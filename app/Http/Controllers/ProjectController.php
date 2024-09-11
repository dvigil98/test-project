<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Interfaces\IProjectService;

class ProjectController extends Controller
{
    private $projectService;

    public function __construct(IProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $projects = $this->projectService->getProjects();
        return view('projects/index', ['projects' => $projects]);
    }

    public function create()
    {
        return view('projects/create');
    }

    public function store(StoreProjectRequest $request)
    {
        if ($this->projectService->saveProject($request))
            return redirect('/projects/create')->with('msgType', 'success')->with('msg', 'Datos guardados');
        else
            return redirect('/projects/create')->with('msgType', 'error')->with('msg', 'Datos no guardados');
    }

    public function edit($id)
    {
        $project = $this->projectService->getProject($id);
        return view('projects/edit', ['project' => $project]);
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        if ($this->projectService->updateProject($request, $id))
            return redirect('/projects')->with('msgType', 'success')->with('msg', 'Datos actualizados');
        else
            return redirect('/projects')->with('msgType', 'error')->with('msg', 'Datos no actualizados');
    }

    public function destroy($id)
    {
        if ($this->projectService->deleteProject($id))
            return redirect('/projects')->with('msgType', 'success')->with('msg', 'Datos eliminados');
        else
            return redirect('/projects')->with('msgType', 'error')->with('msg', 'Datos no eliminados');
    }

    public function show($id)
    {
        $project = $this->projectService->getProject($id);
        return view('projects/show', ['project' => $project]);
    }
}
