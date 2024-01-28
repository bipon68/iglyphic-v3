<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;

class ControllerCallerController extends Controller
{
    public function index()
    {
        // Get a list of all registered routes
        $routes = Route::getRoutes();

        foreach ($routes as $route) {
            $controller = $route->getAction('controller');

            if ($controller) {
                list($controllerClass, $method) = explode('@', $controller);

                // Call the controller method using reflection
                app()->call($controllerClass . '@' . $method);
            }
        }
        $aaa = error_reporting(E_ALL ^ E_NOTICE) ."\n". error_reporting(0);


        return $aaa;
    }
}
