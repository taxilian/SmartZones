<?php

namespace taxilian\SmartZones;

abstract class Kernel {
    protected $_services;
    protected $_mode;

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
};

