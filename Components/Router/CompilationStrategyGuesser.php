<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 9:37 AM
 */

namespace Framework\Components\Router;


use Framework\Components\Compiler\Strategy\CompilationStrategyInterface;
use Framework\Components\Compiler\Strategy\NoRouteCompilationStrategy;
use Framework\Components\Compiler\Strategy\PreSluggedCompilationStrategy;
use Framework\Components\Compiler\Strategy\SimpleCompilationStrategy;
use Framework\Components\Request\Request;

class CompilationStrategyGuesser
{

    public function guessAndGetStrategy(Request $request, RouteCollectionInterface $routeCollection) : CompilationStrategyInterface
    {

        $route = null;

        if (null !== $route = $routeCollection->get($request)) {
            return new SimpleCompilationStrategy($route, $request);
        } else {
            if (!$this->checkIfPreSlugged($request, $routeCollection)) {
                return new NoRouteCompilationStrategy($route, $request);
            } else {
                return new PreSluggedCompilationStrategy($route, $request);
            }
        }
    }

    private function checkIfPreSlugged(Request $request, RouteCollectionInterface $routeCollection) : bool
    {

    }

}