<?php

namespace taxilian\SmartZones;

abstract class Kernel {
    protected $_services = null;
    protected $_request = null;
    protected $_mode = "";

    public function __construct($mode = "production") {
        $this->_mode = $mode;
    }

    /**
     * @ignore
     **/
    protected function setServices($s) {
        $this->services = $s;
    }

    public function init($mode = "production") {
        $this->_mode = $mode;
    }

    abstract public function getRootDir();
    abstract public function getZoneDirs();

    public function run() {
    }

    public function getRequest() {
        if (empty($this->_request)) {
            $this->_request = $this->createRequest();
        }
        return $this->_request;
    }

    protected function createRequest() {
        return new Request();
    }
};

