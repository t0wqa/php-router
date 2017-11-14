<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 4:42 PM
 */

namespace Framework\Core\Container;


class Container
{

    protected $services = [];

    public function get($key)
    {
        return $this->services[$key] ?? null;
    }

    public function set($key, $value)
    {
        $this->services[$key] = $value;
    }

}