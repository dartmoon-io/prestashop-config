<?php

namespace Dartmoon\Config\Facades;

use Dartmoon\Config\Config as Service;

class Config
{
    public static function __callStatic($name, $arguments)
    {
        $service = new Service;
        return call_user_func_array([$service, $name], $arguments);
    }
}