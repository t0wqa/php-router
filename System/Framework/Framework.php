<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 11/3/17
 * Time: 1:21 PM
 */

namespace System\Framework;


use Framework\Components\Request\Request;

class Framework
{

    protected $booted;

    protected $container;

    public function boot()
    {
        $this->initializeServices();

        $this->createContainer();

        $this->bootUp();
    }

    public function run(Request $request)
    {
        if (!$this->booted) {
            $this->boot();
        }

        $this->getEventListener()->pushEvent(FrameworkEvents::REQUEST_STARTED);
        $this->getEventListener()->pushEvent(FrameworkEvents::REQUEST_ON_VALIDATION);
        $this->getEventListener()->pushEvent(FrameworkEvents::CONTROLLER_CALLED);
        $this->getEventListener()->pushEvent(FrameworkEvents::RESPONSE_GENERATED);
        $this->getEventListener()->pushEvent(FrameworkEvents::RESPONSE_SEND);
        $this->getEventListener()->pushEvent(FrameworkEvents::LIFECYCLE_TERMINATED);

    }

    public function getEventListener()
    {
        return $this->getContainer()->get('framework.event_listener');
    }

    public function getContainer()
    {
        return $this->container;
    }

    private function bootUp()
    {
        $this->booted = true;
    }

}