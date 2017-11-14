<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 4:48 PM
 */

namespace Framework\Core;


use Framework\Components\Request\Request;
use Framework\Components\Router\Route;
use Framework\Components\Router\RouteBuilder\RouteBuilder;
use Framework\Components\Router\RouteBuilder\RouteCollection;
use Framework\Components\Router\Router;
use Framework\Config\Routes;
use Framework\Core\Container\Container;

class Application
{

    protected $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function run()
    {
        $this->init();
        $this->compileRoute();
    }

    public function init()
    {
        $this->bootstrap();
    }

    private function bootstrap()
    {
        $this->container->set('router.route_collection', new RouteCollection());
        $this->container->set('router.router', new Router());
    }

    public function getContainer()
    {
        return $this->container;
    }

    private function compileRoute()
    {
        $routes = Routes::getRoutes();

        foreach ($routes as $uriPath => $routeArray) {
            $routeBuilder = new RouteBuilder();

            $routeBuilder = $routeBuilder->uriPath($uriPath);
            $routeBuilder = $routeBuilder->mappedPath($routeArray['mappedPath']);

            $route = new Route($routeBuilder);

            $this->container->get('router.route_collection')
                ->add($route);
        }

        $this->container->get('router.router')
            ->process(new Request(), $this->container->get('router.route_collection'));
    }



}