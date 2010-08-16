<?php

namespace taxilian\SmartZones\example;

use \taxilian\SmartZones\Kernel;

class RouterMyApp extends \taxilian\SmartZones\ClassRouter {
    protected $kernel;

    public function __construct(Kernel $kernel) {
        $this->kernel = $kernel;
    }

    public function handleRequest() {
        $searchstr = "/()/";

    }
}
