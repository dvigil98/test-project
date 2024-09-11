<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Utils\RespondsWithHttpStatus;
use App\Interfaces\IProjectService;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    use RespondsWithHttpStatus;

    private $projectService;

    public function __construct(IProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $projects = $this->projectService->getProjects();
        return $this->response(code: 200, message: 'Peticion exitosa', data: $projects);
    }

    public function store(StoreProjectRequest $request)
    {
        if ($this->projectService->saveProject($request))
            return $this->response(code: 201, message: 'Datos guardados');
        else
            return $this->response(code: 404, message: 'Peticion erronea', errors: ['Datos no guardados']);
    }

    public function show($id)
    {
        $project = $this->projectService->getProject($id);
        return $this->response(code: 200, message: 'Peticion exitosa', data: $project);
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        if ($this->projectService->updateProject($request, $id))
            return $this->response(code: 200, message: 'Datos actualizados');
        else
            return $this->response(code: 404, message: 'Peticion erronea', errors: ['Datos no actualizados']);
    }

    public function destroy($id)
    {
        if ($this->projectService->deleteProject($id))
            return $this->response(code: 200, message: 'Datos eliminados');
        else
            return $this->response(code: 404, message: 'Peticion erronea', errors: ['Datos no eliminados']);
    }
}
