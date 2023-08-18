<?php

namespace App\Providers;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\SchoolInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Repositories\ClassroomRepository;
use App\Contracts\Repositories\SchoolRepository;
use App\Contracts\Repositories\StudentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    private array $register = [
        SchoolInterface::class => SchoolRepository::class,
        ClassroomInterface::class => ClassroomRepository::class,
        StudentInterface::class => StudentRepository::class,
    ];
    public function register(): void
    {
        foreach ($this->register as $index => $value) $this->app->bind($index, $value);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
