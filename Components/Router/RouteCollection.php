<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 9:23 AM
 */

namespace Framework\Components\Router\RouteBuilder;


use Framework\Components\Request\Request;
use Framework\Components\Router\Route;
use Framework\Components\Router\RouteCollectionInterface;

class RouteCollection implements RouteCollectionInterface
{

    protected $routes = [];

    public function get(Request $request)
    {
        $rule = $request->getPathInfo();

        if (isset($this->routes[$rule])) {
            return $this->routes[$rule];
        }

        $URIParts = explode('/', $rule);

        foreach ($URIParts as $key => $part) {
            if (empty($part)) {
                unset($URIParts[$key]);
            }
        }

        $simplePath = reset($URIParts);

        foreach (array_keys($this->routes) as $path) {
            if (preg_match("#^/?$simplePath/.*#", $path)) {
                return $this->routes[$path];
            }
        }
    }

    public function add(Route $route)
    {
        $this->routes[$route->getUriPath()] = $route;
    }

    public function remove(Route $route)
    {
        // TODO: Implement remove() method.
    }

    public function has(Request $request)
    {
        // TODO: Implement has() method.
    }
}