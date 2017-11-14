<?php

/**
 * - Client sends some HTTP Message to the Server
 * - Incoming data fills and forms the Request Object
 * - Method, Controller and needed arguments / a callback are
 * retrieved in a CompiledRoute Object. RouteCollection gets cached
 * - Basic HTTP Validation happens - whether a method is allowed, etc.
 * - Custom user validators are called
 * - Custom user preActionEvents are called
 * - Controller action is called and returns a Response Object
 * - ResponseResolver parses Response Object and returns content
 * in a needed format back to the client as an HTTP Message
 * - Custom user postActionEvents are called
 * - All the objects get terminated
 * -
 */


class Container
{

    public function get($key, $args = [])
    {
        return new Router();
    }

    public function set()
    {

    }

    public function has()
    {

    }

}

interface ContainerAwareInterface
{

    public function setContainer($container);

    public function getContainer($container);

}

trait ContainerAwareTrait
{

    /**
     * @var Container $container
     */
    protected $container;

    public function setContainer($container)
    {
        $this->container = $container;
    }

    public function getContainer()
    {
        return $this->container;
    }

}

class Application implements ContainerAwareInterface
{

    use ContainerAwareTrait;

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;

        $this->setContainer($this->loadSystemComponents());
    }

    public function setContainerToComponents()
    {

    }

    public function init()
    {

    }

    public function run()
    {
        $this->init();

        $compiledRoute = $this->getRouter()->getCompiledRoute();

        $this->checkHttpRequirements($compiledRoute);

        foreach ($compiledRoute->getValidators() as $validator) {
            if (!$validator->validate()) {
                return false;
            }
        }

        foreach ($this->getPreActionEvents() as $preActionEvent) {
            $preActionEvent->run();
        }

        $response = $this->callAction($compiledRoute);

        $this->resolveResponse($response);

        foreach ($this->getPostActionEvents() as $postActionEvent) {
            $postActionEvent->run();
        }

        $this->terminate();

    }

    /**
     * @return Router|mixed
     */
    public function getRouter()
    {
        return $this->container->get('router.router');
    }

}

class Router
{
    public function getCompiledRoute()
    {
        return 123;
    }
}