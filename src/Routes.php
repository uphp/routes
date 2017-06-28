<?php
namespace UPhp\ActionDispach;

use UPhp\ActionDispach\Exception\NoRouteException;

class Routes
{
    private static $routes = [];

    public static function route(array $arrRoute)
    {
        foreach ($arrRoute as $arr) {
            foreach ($arr as $arrOpt) {
                if (is_array($arrOpt)) {
                    array_push(self::$routes, $arrOpt);
                } else {
                    array_push(self::$routes, $arr);
                    break;
                }
            }
        }
    }

    public static function getControllerAction($config)
    {
        foreach (self::$routes as $route ) {
            if ( $route["URL"] == $config["URI"] && $route["VERB"] == $config["METHOD"]) {
                return $route;
            }
        }
        throw new NoRouteException($config);
    }
}
