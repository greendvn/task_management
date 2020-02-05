<?php

namespace App\Providers;

use App\Http\Repositories\TaskRepo;
use App\Http\Repositories\TaskRepoInterface;
use App\Http\Services\TaskService;
use App\Http\Services\TaskServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton( TaskRepoInterface::class,TaskRepo::class);
        $this->app->singleton(TaskServiceInterface::class,TaskService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
