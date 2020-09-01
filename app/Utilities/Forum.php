<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Route;

class Forum extends Route 
{
    protected static $routes;
    protected static $names;
    protected static $controller;

    private static function defaultOptions($url) 
    {
        self::$controller = ucfirst($url) . 'Controller';

        self::$routes = [
            'index' => "{$url}", 
            'create' => "{$url}/create", 
            'show' => "{$url}/{thread}",
            'store' => "{$url}"
        ];

        self::$names = [
            'index' => "{$url}.index", 
            'create' => "{$url}.create", 
            'show' => "{$url}.show",
            'store' => "{$url}.store"
        ];
    }

    private static function customOptions($withOptions)
    {
        foreach($withOptions as $option => $value){
            if ($option === 'names') {
                foreach($value as $method => $name) {
                    self::$names[$method] = $name;
                }
            }

            if ($option === 'routes') {
                foreach($value as $method => $url) {
                    self::$routes[$method] = $url;
                }
            }
        }
    }

    public static function routes($url, $options = [])
    {
        self::defaultOptions($url);

        if (!empty($options)) {
            self::customOptions($options);
        }
        
        foreach(self::$routes as $controllerMethod => $urlPath) {
            $httpMethod = 'get';

            if ($controllerMethod === 'store') {
                $httpMethod = 'post';
            }

            self::$httpMethod($urlPath, self::$controller . "@{$controllerMethod}")->name(self::$names[$controllerMethod]);
        }
    }
}