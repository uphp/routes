<?php
namespace UPhp\ActionDispach;

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

    public static function getControllerActionByURL($url)
    {
        foreach (self::$routes as $route ) {
            if ( $route["URL"] == $url)
            {
                return $route;
            }
        }
    }
}
