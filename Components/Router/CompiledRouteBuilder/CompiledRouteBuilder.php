<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 3:30 PM
 */

namespace Framework\Components\CompiledRouteBuilder;


class CompiledRouteBuilder
{

    protected $calledClass = null;

    protected $calledMethod = null;

    protected $arguments = [];

    protected $validators = [];

    protected $options = [];

    /**
     * @param string $calledClass
     * @return CompiledRouteBuilder
     */
    public function calledClass(string $calledClass) : CompiledRouteBuilder
    {
        $this->calledClass = $calledClass;

        return $this;
    }

    /**
     * @param string $calledMethod
     * @return CompiledRouteBuilder
     */
    public function calledMethod(string $calledMethod) : CompiledRouteBuilder
    {
        $this->calledMethod = $calledMethod;

        return $this;
    }

    /**
     * @param array $arguments
     * @return CompiledRouteBuilder
     */
    public function arguments(array $arguments) : CompiledRouteBuilder
    {
        $this->arguments = $arguments;

        return $this;
    }

    /**
     * @param array $validators
     * @return CompiledRouteBuilder
     */
    public function validators(array $validators) : CompiledRouteBuilder
    {
        $this->validators = $validators;

        return $this;
    }

    /**
     * @param array $options
     * @return CompiledRouteBuilder
     */
    public function options(array $options) : CompiledRouteBuilder
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return CompiledRouteBuilder
     */
    public function build() : CompiledRouteBuilder
    {
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalledClass()
    {
        return $this->calledClass;
    }

    /**
     * @return mixed
     */
    public function getCalledMethod()
    {
        return $this->calledMethod;
    }

    /**
     * @return mixed
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @return mixed
     */
    public function getValidators()
    {
        return $this->validators;
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }



}