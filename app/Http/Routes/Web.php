<?php

namespace App\Http\Routes;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

class Web extends Route 
{
    private static $uris;
    private static $routesNames;

    public static function routes($uri, $options = [])
    {
        $uri = Str::lower($uri);

        self::defaultRoutes($uri);
        
        if (!empty($options)) {
            self::customRoutes($options);
        }
    
        foreach (self::$uris as $action => $fullUri) {
            self::route($fullUri, $action);
        }
    }

    private static function defaultRoutes($uri)
    {
        self::$uris = [
            'index' => $uri,
            'create' => "{$uri}/create",
            'show'  => "{$uri}/{thread}",
            'store' => "{$uri}"
        ];

        self::$routesNames = [
            'index' => "{$uri}.index",
            'create' => "{$uri}.create",
            'show'  => "{$uri}.show",
            'store' => "{$uri}.store"
        ];
    }

    private static function customRoutes($withOptions)
    {
        foreach ($withOptions as $option => $optionValues) {
            if (Str::of($option)->exactly('routes')) {
                foreach($optionValues as $action => $uri) {
                    self::$uris[$action] = $uri;
                }
            }
    
            if (Str::of($option)->exactly('names')) {
                foreach($optionValues as $action => $name) {
                    self::$routesNames[$action] = $name;
                }
            }
        }
    }

    private static function route($fullUri, $action, $method = 'get')
    {
        $uri = Str::of($fullUri)->explode('/')[0];
        
        if (Str::of($action)->exactly('store')) {
            $method = 'post';
        }
        
        self::$method(
            $fullUri, 
            ucfirst($uri) . "Controller@{$action}"
        )->name($uri . ".{$action}");
    }
}