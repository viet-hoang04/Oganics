<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Composers\CategoryComposer;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer([ 'header','home'], CategoryComposer::class);
    }

    public function register()
    {
        //
    }
}
