<?php
namespace UPhp\ActionDispach\Exception;

use \src\UphpException;

class NoRouteException extends UphpException
{
    public function __construct(){
        parent::__construct("Route not found", __CLASS__);
    }
}