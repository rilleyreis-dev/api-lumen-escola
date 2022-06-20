<?php

declare(strict_types=1);
namespace App\Providers;

use App\Models\Classes\Classes;
use App\Repository\Classes\ClassesRepository;
use App\Services\Classes\ClassesService;
use Illuminate\Support\ServiceProvider;

/**
 * Class ClassesServiceProvider
 * @package App\Providers
 */
class ClassesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ClassesService::class, function ($app) {
            return new ClassesService(new ClassesRepository(new Classes()));
        });
    }
}
