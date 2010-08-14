<?php

namespace taxilian\SmartZones;

abstract class Zone {
    protected $services;

    /**
     * @ignore
     **/
    public function setServices($s) {
        $this->services = $s;
    }

    /**
     * @ignore
     **/
    protected function getRequest() {
        return $this->services->getRequest();
    }

    /**
     * @ignore
     **/
    protected function getRouter() {
        return $thsi->services->getRouter();
    }
};
