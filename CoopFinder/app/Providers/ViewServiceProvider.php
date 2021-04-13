<?php

namespace App\Providers;

use App\Http\View\Composers\UserComposer;
use App\Http\View\Composers\CoopComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view::composer('*', UserComposer::class);
        // view::composer('*',CoopComposer::class);
    }
}
