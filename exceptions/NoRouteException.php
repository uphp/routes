<?php
namespace UPhp\ActionDispach\Exception;

use \src\UphpException;

class NoRouteException extends UphpException
{
    public function __construct($uri){
        parent::__construct("Route <strong>" . $uri . " </strong>not found", __CLASS__);
    }
}