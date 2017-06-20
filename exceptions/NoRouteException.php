<?php
namespace UPhp\ActionDispach\Exception;

use \src\UphpException;

class NoRouteException extends UphpException
{
    public function __construct($config){
        parent::__construct("Route <strong>" . $config["METHOD"] . " " . $config["URI"] . " </strong>not found", __CLASS__);
    }
}