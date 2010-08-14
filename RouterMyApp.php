<?php

namespace taxilian\SmartZones\example;

class RouterMyApp extends \taxilian\SmartZones\ClassRouter {
    protected $baseUrl = array("http" => array("localhost" => array("/~richard/test/index.php")));
}
