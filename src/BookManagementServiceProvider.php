<?php

namespace Inspirium\BookManagement;

use Illuminate\Support\ServiceProvider;

class BookManagementServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database');

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
