<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('welcome');
});


$containerRoutes = glob(base_path('app/Containers/*/UI/WEB/Routes/*.php'));

foreach ($containerRoutes as $routeFile) {
    require $routeFile;
}
