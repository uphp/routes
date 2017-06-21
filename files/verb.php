<?php
namespace config\routes;

function setVerb($verb, $url, $controllerAction)
{
    return [
        "VERB" => $verb,
        "URL" => $url,
        "CONTROLLER" => explode("#", $controllerAction)[0],
        "ACTION" => explode("#", $controllerAction)[1]
    ];
}

if (! function_exists('get')) {
    function get($url, $controllerAction)
    {
        return setVerb("GET", $url, $controllerAction);
    }
}

if (! function_exists('post')) {
    function post($url, $controllerAction)
    {
        return setVerb("POST", $url, $controllerAction);
    }
}

if (! function_exists('put')) {
    function put($url, $controllerAction)
    {
        return setVerb("PUT", $url, $controllerAction);
    }
}

if (! function_exists('delete')) {
    function delete($url, $controllerAction)
    {
        return setVerb("DELETE", $url, $controllerAction);
    }
}

if (! function_exists('resources')) {
    function resources($controller)
    {
        $resources = [];
        array_push($resources, setVerb("GET", "/" . $controller, $controller . "#index")); // pessoas LISTA
        array_push($resources, setVerb("GET", "/" . $controller . "/new", $controller . "#new")); // pessoas/new FORM NOVA PESSOA
        array_push($resources, setVerb("POST", "/" . $controller, $controller . "#create")); // pessoas CRIAR NOVA PESSOA
        array_push($resources, setVerb("GET", "/" . $controller . "/:id/edit", $controller . "#edit")); // pessoas/1/edit FORM EDITAR PESSOA
        array_push($resources, setVerb("PUT", "/" . $controller . "/:id", $controller . "#update")); // pessoas/1 ATUALIZAR PESSOA
        array_push($resources, setVerb("DELETE", "/" . $controller, $controller . "#destroy")); // pessoas/1 EXCLUIR PESSOA
        return $resources;
    }
}
