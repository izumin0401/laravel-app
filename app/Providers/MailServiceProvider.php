<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\MailInterface;
use App\Services\MailService;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MailInterface::class, function ($app) {
            return $app->make(MailService::class);
        });
    }
}
