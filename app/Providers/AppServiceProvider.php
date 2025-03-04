<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $containerViews = glob(base_path('app/Containers/*/UI/WEB/Views'));
        $containerName = glob(base_path('app/Containers/*'));

        foreach ($containerViews as $key=>$viewPath) {
            View::addNamespace(basename($containerName[$key]), $viewPath);
        }

    }
}

