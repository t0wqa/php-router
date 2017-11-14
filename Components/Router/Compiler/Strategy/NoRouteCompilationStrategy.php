<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 3:04 PM
 */

namespace Framework\Components\Compiler\Strategy;


use Framework\Components\CompiledRouteBuilder\CompiledRouteBuilder;
use Framework\Components\Router\CompiledRoute;
use Framework\Components\Router\Route;

class NoRouteCompilationStrategy extends AbstractCompilationStrategy implements CompilationStrategyInterface
{

    public function compile(CompiledRouteBuilder $builder) : CompiledRoute
    {
        // TODO: Implement compile() method.
    }
}