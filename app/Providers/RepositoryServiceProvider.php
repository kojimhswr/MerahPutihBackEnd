<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Contracts\StudentContract;
use App\Repositories\StudentRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        StudentContract::class          =>          StudentRepository::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}
