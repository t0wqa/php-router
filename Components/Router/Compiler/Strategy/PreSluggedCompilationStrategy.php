<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 3:14 PM
 */

namespace Framework\Components\Compiler\Strategy;


use Framework\Components\CompiledRouteBuilder\CompiledRouteBuilder;
use Framework\Components\Router\CompiledRoute;

class PreSluggedCompilationStrategy extends AbstractCompilationStrategy implements CompilationStrategyInterface
{

    public function compile(CompiledRouteBuilder $builder) : CompiledRoute
    {
        // TODO: Implement compile() method.
    }
}