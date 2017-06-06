<?php
namespace UPhp\ActionDispach;

class Routes
{
    private static $routes;

    public static function route(Array $arrRoute)
    {
        $control = true;
        foreach ($arrRoute as $r) {
            foreach ($r as $k => $v) {
                if ( is_array($v) ) {
                    $control = false;
                    self::$routes = $v;
                } else {
                    break;
                }
            }
        }

        if ($control) {
            self::$routes = $arrRoute;
        }
        
        //if ( isset($arrRoute["VERB"]) )
        //{
        //    self::$routes = $arrRoute;
        //}
        
    }

    public static function action($url)
    {
        //var_dump(self::$routes);
        $a = self::$routes;
        var_dump($a);
        //$flattenRoutes = array_flatten($a);
        //var_dump($flattenRoutes);
        //foreach ($flattenRoutes as $route ) {
            //var_dump($route);
            //echo $route["URL"];
            //if ( $route["URL"] == $url )
            //{
                //echo $route["CONTROLLER"] . "#" . $route["ACTION"];
            //}
        //}
    }

    public static function array_flatten($array)
    {

        $return = array();
        foreach ($array as $key => $value) {
            if (is_array($value)){ $return = array_merge($return, array_flatten($value));}
            else {$return[$key] = $value;}
        }
        return $return;

    }



    private $noRoute = false;

    function callController($ctrlAction)
    {
        $controllerName = explode("#", $ctrlAction)[0];
        $actionName = explode("#", $ctrlAction)[1];

        //require("app/controllers/kernelController.php");

        $className = ucwords($controllerName)."Controller";
        
        $controller = new $className();
        //$controller->beforeFilter(array("verificaLogin"));
        $controller->funcBeforeFilter($controller, $actionName);
        call_user_func(array($controller, $actionName));
        $controller->funcAfterFilter($controller, $actionName);
    }

/*
    function rota($input, $ctrlAction)
    {        
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $url = explode("?", $_SERVER['REQUEST_URI'])[0];
        } else {
            $url = $_SERVER['REQUEST_URI'];
        }
        
        if ($url == Constants::DEVURL.$input) {
            $this::callController($ctrlAction);
            $this->noRoute = $this->noRoute || true;
        } else {
            $this->noRoute = $this->noRoute || false;
        }
    }
*/
    /*function get($input, $ctrlAction)
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $this->rota($input, $ctrlAction);
        }
    }

    function post($input, $ctrlAction)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->rota($input, $ctrlAction);
        }
    }

    function put($input, $ctrlAction)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["_method"])) {
            if ($_POST["_method"] == "PUT") {
                $this->rota($input, $ctrlAction);
            }
        } elseif ($_SERVER['REQUEST_METHOD'] == "PUT") {
            $this->rota($input, $ctrlAction);
        }
    }

    function delete($input, $ctrlAction)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["_method"])) {
            if ($_POST["_method"] == "DELETE") {
                $this->rota($input, $ctrlAction);
            }
        } elseif ($_SERVER['REQUEST_METHOD'] == "DELETE") {
            $this->rota($input, $ctrlAction);
        }
    }*/

    function getnoRoute()
    {
        return $this->noRoute;
    }
}
