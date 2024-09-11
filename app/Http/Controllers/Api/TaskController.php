<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Utils\RespondsWithHttpStatus;
use App\Interfaces\ITaskService;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    use RespondsWithHttpStatus;

    private $taskService;

    public function __construct(ITaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->getTasks();
        return $this->response(code: 200, message: 'Peticion exitosa', data: $tasks);
    }

    public function store(StoreTaskRequest $request)
    {
        if ($this->taskService->saveTask($request))
            return $this->response(code: 201, message: 'Datos guardados');
        else
            return $this->response(code: 404, message: 'Peticion erronea', errors: ['Datos no guardados']);
    }

    public function show($id)
    {
        $task = $this->taskService->getTask($id);
        return $this->response(code: 200, message: 'Peticion exitosa', data: $task);
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        if ($this->taskService->updateTask($request, $id))
            return $this->response(code: 200, message: 'Datos actualizados');
        else
            return $this->response(code: 404, message: 'Peticion erronea', errors: ['Datos no actualizados']);
    }

    public function destroy($id)
    {
        if ($this->taskService->deleteTask($id))
            return $this->response(code: 200, message: 'Datos eliminados');
        else
            return $this->response(code: 404, message: 'Peticion erronea', errors: ['Datos no eliminados']);
    }
}
