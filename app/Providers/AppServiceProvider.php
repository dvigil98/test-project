<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Repositories
use App\Interfaces\IAuthRepository;
use App\Repositories\AuthRepository;

use App\Interfaces\IProjectRepository;
use App\Repositories\ProjectRepository;

use App\Interfaces\ITaskRepository;
use App\Repositories\TaskRepository;

// Services
use App\Interfaces\IAuthService;
use App\Services\AuthService;

use App\Interfaces\IProjectService;
use App\Services\ProjectService;

use App\Interfaces\ITaskService;
use App\Services\TaskService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Repositories
        $this->app->bind(IAuthRepository::class, AuthRepository::class);
        $this->app->bind(IProjectRepository::class, ProjectRepository::class);
        $this->app->bind(ITaskRepository::class, TaskRepository::class);

        // Services
        $this->app->bind(IAuthService::class, AuthService::class);
        $this->app->bind(IProjectService::class, ProjectService::class);
        $this->app->bind(ITaskService::class, TaskService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
