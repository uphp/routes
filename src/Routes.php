<?php
namespace UPhp\ActionDispach;

use UPhp\ActionDispach\Exception\NoRouteException;

class Routes
{
    private static $routes = [];
    private static $specialRoutes = [];

    public static function route(array $arrRoute, bool $special = false)
    {
        foreach ($arrRoute as $arr) {
            foreach ($arr as $arrOpt) {
                if (is_array($arrOpt)) {
                    if (empty($special))
                        array_push(self::$routes, $arrOpt);
                    else
                        array_push(self::$specialRoutes, $arrOpt);
                } else {
                    if (empty($special))
                        array_push(self::$routes, $arr);
                    else
                        array_push(self::$specialRoutes, $arr);
                    break;
                }
            }
        }
    }

    public static function getControllerAction($config, bool $special = false)
    {
        if (empty($special))
            $routes = self::$routes;
        else
            $routes = self::$specialRoutes;

        foreach ($routes as $route ) {
            if ( $route["URL"] == $config["URI"] && $route["VERB"] == $config["METHOD"]) {
                return $route;
            }
        }
        throw new NoRouteException($config);
    }
}
