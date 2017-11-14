<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 8:34 AM
 */

namespace Framework\Components\Router\RouteBuilder;


use Framework\Components\Request\Request;

class RouteBuilder extends Builder
{
    public function context(Request $request): Builder
    {
        $this->context = $request;

        return $this;
    }

    public function uriPath(string $uriPath): Builder
    {
        $this->uriPath = $uriPath;

        return $this;
    }

    public function mappedPath(string $mappedPath): Builder
    {
        $this->mappedPath = $mappedPath;

        return $this;
    }

    public function name(string $name): Builder
    {
        $this->name = $name;

        return $this;
    }

    public function methods(array $methods): Builder
    {
        $this->methods = $methods;

        return $this;
    }

    public function schema(string $schema): Builder
    {
        $this->schema = $schema;

        return $this;
    }

    public function definedActions(array $definedActions): Builder
    {
        $this->definedActions = $definedActions;

        return $this;
    }

    public function redirect(string $redirect) : Builder
    {
        $this->redirect = $redirect;

        return $this;
    }

    public function build(): Builder
    {
        return $this;
    }


}