<?php

namespace App\Providers;

use App\Console\Commands\WebSocketServer;
use App\Http\Controllers\WebSocketController;
use App\Services\WebSocketService;
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
        //
       // echo "In register method....";
        $wsService = new WebSocketService();
        $this->app->instance(WebSocketService::class, $wsService);

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
