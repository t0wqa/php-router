<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 9:20 AM
 */

namespace Framework\Components\Compiler;


use Framework\Components\CompiledRouteBuilder\CompiledRouteBuilder;
use Framework\Components\Request\Request;
use Framework\Components\Router\CompilationStrategyGuesser;
use Framework\Components\Router\CompiledRoute;
use Framework\Components\Router\RouteCollectionInterface;


/**
 * Class RouteCompiler
 * @package Framework\Components\Compiler
 */
class RouteCompiler
{

    /**
     * @var Strategy\CompilationStrategyInterface
     */
    protected $compilationStrategy;

    public function __construct(Request $request, RouteCollectionInterface $routeCollection, CompilationStrategyGuesser $guesser)
    {
        $this->compilationStrategy = $guesser->guessAndGetStrategy($request, $routeCollection);
    }

    /**
     * @param CompiledRouteBuilder $builder
     * @return CompiledRoute
     */
    public function compile(CompiledRouteBuilder $builder) : CompiledRoute
    {
        return $this->compilationStrategy->compile($builder);
    }

}