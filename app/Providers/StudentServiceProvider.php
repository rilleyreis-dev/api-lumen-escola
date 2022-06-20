<?php

declare(strict_types=1);
namespace App\Providers;

use App\Models\Students\Students;
use App\Repository\Students\StudentsRepository;
use App\Services\Students\StudentsService;
use Illuminate\Support\ServiceProvider;

/**
 * Class StudentsServiceProvider
 * @package App\Providers
 */
class StudentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(StudentsService::class, function ($app) {
            return new StudentsService(new StudentsRepository(new Students()));
        });
    }

}
