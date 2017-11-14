<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 8:34 AM
 */

namespace Framework\Components\Router\RouteBuilder;


use Framework\Components\Request\Request;

abstract class Builder
{

    protected $context;

    protected $uriPath;

    protected $mappedPath;

    protected $name;

    protected $methods;

    protected $schema;

    protected $definedActions;

    protected $redirect;

    abstract public function context(Request $request) : Builder;

    abstract public function uriPath(string $uriPath) : Builder;

    abstract public function mappedPath(string $mappedPath) : Builder;

    abstract public function name(string $name) : Builder;

    abstract public function methods(array $methods) : Builder;

    abstract public function schema(string $schema) : Builder;

    abstract public function definedActions(array $definedActions) : Builder;

    abstract public function redirect(string $redirect) : Builder;

    abstract public function build() : Builder;

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @return mixed
     */
    public function getUriPath()
    {
        return $this->uriPath;
    }

    /**
     * @return mixed
     */
    public function getMappedPath()
    {
        return $this->mappedPath;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getMethods()
    {
        return $this->methods;
    }

    /**
     * @return mixed
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @return mixed
     */
    public function getDefinedActions()
    {
        return $this->definedActions;
    }

    /**
     * @return mixed
     */
    public function getRedirect()
    {
        return $this->redirect;
    }


}