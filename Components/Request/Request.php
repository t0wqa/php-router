<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 8:38 AM
 */

namespace Framework\Components\Request;


class Request
{

    protected $pathInfo;

    public function __construct()
    {
        $this->pathInfo = $_SERVER['PATH_INFO'];
    }

    public function getPathInfo()
    {
        return $this->pathInfo;
    }

}