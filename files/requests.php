<?php
return [
    "URI" => explode("?", $_SERVER['REQUEST_URI'])[0],
    "METHOD" => $_SERVER["REQUEST_METHOD"]
];