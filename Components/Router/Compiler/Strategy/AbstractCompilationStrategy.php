<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 3:17 PM
 */

namespace Framework\Components\Compiler\Strategy;


use Framework\Components\Request\Request;
use Framework\Components\Router\Route;

abstract class AbstractCompilationStrategy implements CompilationStrategyInterface
{

    protected $route;

    protected $request;

    public function __construct(Route $route, Request $request)
    {
        $this->route = $route;
        $this->request = $request;
    }

}