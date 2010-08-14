<?php

namespace taxilian\SmartZones\example;

/**
 * @template_engine("smarty3")
 **/
class ZoneDefault extends \taxilian\SmartZones\Zone
{
    /**
     * @onEvent(pageLoad)
     **/
    public function initPages() {
        
    }

    /**
     * @url()
     * @template(default)
     * @vars("FULL_PATH", "path")
     **/
    public function pageDefault($path) {
        $response = array();
        $session = $this->services->getSession();

        $response["username"] = $session["username"];
        $response["title"] = "This will be given to the template";
    }

    /**
     * @url(login)
     * @template(login)
     * @allow(xml,json)
     **/
    public function pageLogin($path) {
    }

    /**
     * @url(getLogin)
     * @outputProcessor("taxilian\SmartZones\AjaxJson")
     * @vars("GET", "username", "password")
     **/
    public function ajaxGetLogin($username, $password) {
        return array("logged_in" => false);
    }

    /**
     * @url(tryLogin)
     * @outputProcessor("taxilian\SmartZones\AjaxJson")
     * @vars("POST", "username", "password")
     **/
    public function ajaxLogin($username, $password) {
        return array("success" => false);
    }
}
