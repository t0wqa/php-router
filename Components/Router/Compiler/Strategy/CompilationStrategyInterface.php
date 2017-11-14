<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 2:52 PM
 */

namespace Framework\Components\Compiler\Strategy;


use Framework\Components\CompiledRouteBuilder\CompiledRouteBuilder;
use Framework\Components\Router\CompiledRoute;

interface CompilationStrategyInterface
{

    public function compile(CompiledRouteBuilder $builder) : CompiledRoute;

}