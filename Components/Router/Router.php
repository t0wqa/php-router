<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 8:23 AM
 */

namespace Framework\Components\Router;


use Framework\Components\CompiledRouteBuilder\CompiledRouteBuilder;
use Framework\Components\Compiler\RouteCompiler;
use Framework\Components\Request\Request;
use Framework\Components\Router\RouteBuilder\RouteCollection;

class Router
{

    public function process(Request $request, RouteCollection $routeCollection)
    {
        $routeCompiler = new RouteCompiler($request, $routeCollection, new CompilationStrategyGuesser());

        $compiledRoute = $routeCompiler->compile(new CompiledRouteBuilder());
    }

}