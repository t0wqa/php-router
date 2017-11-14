<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 9:24 AM
 */

namespace Framework\Components\Router;


use Framework\Components\Request\Request;

interface RouteCollectionInterface
{

    public function get(Request $request);

    public function add(Route $route);

    public function remove(Route $route);

    public function has(Request $request);

}