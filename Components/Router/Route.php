<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 8:27 AM
 */

namespace Framework\Components\Router;


use Framework\Components\Request\Request;
use Framework\Components\Router\RouteBuilder\Builder;

class Route
{

    /**
     * @var Request $request
     */
    protected $context;

    /**
     * @var mixed
     */
    protected $uriPath;

    /**
     * @var mixed
     */
    protected $mappedPath;

    /**
     * @var mixed
     */
    protected $name;

    /**
     * @var mixed
     */
    protected $methods;

    /**
     * @var mixed
     */
    protected $schema;

    /**
     * @var mixed
     */
    protected $redirect;

    public function __construct(Builder $builder)
    {
        $this->context = $builder->getContext();
        $this->uriPath = $builder->getUriPath();
        $this->mappedPath = $builder->getMappedPath();
        $this->name = $builder->getName();
        $this->methods = $builder->getMethods();
        $this->schema = $builder->getSchema();
        $this->redirect = $builder->getRedirect();
    }

    /**
     * @return Request
     */
    public function getContext(): Request
    {
        return $this->context;
    }

    /**
     * @param Request $context
     */
    public function setContext(Request $context)
    {
        $this->context = $context;
    }

    /**
     * @return mixed
     */
    public function getUriPath()
    {
        return $this->uriPath;
    }

    /**
     * @param mixed $uriPath
     */
    public function setUriPath($uriPath)
    {
        $this->uriPath = $uriPath;
    }

    /**
     * @return mixed
     */
    public function getMappedPath()
    {
        return $this->mappedPath;
    }

    /**
     * @param mixed $mappedPath
     */
    public function setMappedPath($mappedPath)
    {
        $this->mappedPath = $mappedPath;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMethods()
    {
        return $this->methods;
    }

    /**
     * @param mixed $methods
     */
    public function setMethods($methods)
    {
        $this->methods = $methods;
    }

    /**
     * @return mixed
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @param mixed $schema
     */
    public function setSchema($schema)
    {
        $this->schema = $schema;
    }

    /**
     * @return mixed
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    /**
     * @param mixed $redirect
     */
    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;
    }



}