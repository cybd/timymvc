<?php

class Route
{
    static function start() {
        $controllerName = 'Main';
        $actionName = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $controllerName = $routes[1];
        }

        if (!empty($routes[2])) {
            $actionName = $routes[2];
        }

        $modelName = strtolower($controllerName);
        $modelFile = $modelName . '.php';
        $modelPath = 'application/model/' . $modelFile;

        if (file_exists($modelPath)) {
            include $modelPath;
        }

        $controllerName = strtolower($controllerName);
        $controllerFile = $controllerName . '.php';
        $controllerPath = 'application/controller/' . $controllerFile;

        if (file_exists($controllerPath)) {
            include $controllerPath;
        } else {
            Route::errorPage404();
        }

        $actionName = $actionName . 'Action';

        $controllerName .= 'Controller';

        $controller = new $controllerName;
        $action = $actionName;

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            Route::errorPage404();
        }
    }

    static function errorPage404() {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location:'.$host.'404');
        die();
    }
}