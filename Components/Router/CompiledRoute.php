<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 8:52 AM
 */

namespace Framework\Components\Router;


use Framework\Components\CompiledRouteBuilder\CompiledRouteBuilder;

class CompiledRoute
{

    protected $calledClass;

    protected $calledMethod;

    protected $arguments;

    protected $validators;

    protected $options;

    public function __construct(CompiledRouteBuilder $builder)
    {
        $this->calledClass = $builder->getCalledClass();
        $this->calledMethod = $builder->getCalledMethod();
        $this->arguments = $builder->getArguments();
        $this->validators = $builder->getValidators();
        $this->options = $builder->getOptions();
    }

    public function setOptions($options)
    {
        $this->options = $options;
    }

    public function getInfo()
    {
        return $this->calledClass . ' ' . $this->calledMethod;
    }

}