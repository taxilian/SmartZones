<?php

namespace taxilian\SmartZones;

class Request {
    protected $_protocol = "";
    protected $_pathInfo = "";
    protected $_scriptPath = "";
    protected $_host = "";
    protected $_appBaseUrl = "";

    public function __construct() {
    }

    public function getProtocol() {
        if (!empty($this->_protocol)) {
            return $this->_protocol;
        }

        if( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' )
            $protocol = 'https://';
        elseif ( isset($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on')
            $protocol = 'https://';
        else
            $protocol = 'http://';
        return $this->_protocol = $protocol;
    }

    public function getHost() {
        if (!empty($this->_host)) {
            return $this->_host;
        } else {
            return $this->_host = $_SERVER['HTTP_HOST'];
        }
    }

    public function getRootUrl() {
        return $this->getProtocol() . $this->getHost();
    }

    public function getPathInfo() {
        if (!empty($this->_pathInfo)) {
            return $this->_pathInfo;
        }

        $virtualPath = isset($_SERVER['PATH_INFO']) ?
            $_SERVER['PATH_INFO'] : (isset($_SERVER["ORIG_PATH_INFO"]) ?
                $_SERVER["ORIG_PATH_INFO"] : ''
            );
        return $this->_pathInfo = $virtualPath;
    }

    public function getAppBaseUrl() {
        if (!empty($this->_appBaseUrl)) {
            return $this->_appBaseUrl;
        }
        return $this->_appBaseUrl = dirname($this->getScriptPath());
    }

    public function getResourcePath($resource) {
        return $this->getAppBaseUrl() . "/" . $resource;
    }

    public function getScriptPath() {
        if (!empty($this->_scriptPath)) {
            return $this->_scriptPath;
        }
        $virtualPath = $this->getPathInfo();
        //      what other situations besides mod_rewrite set this to 200?
        if(isset($_SERVER['REDIRECT_STATUS']) && $_SERVER['REDIRECT_STATUS'] == 200)
        {
            $uri = urldecode($_SERVER['REQUEST_URI']);
            if($pos = strpos($uri, '?'))
                $uri = substr($uri, 0, $pos);

            if( $virtualPath && substr($uri, 0-strlen($virtualPath)) == $virtualPath )
                $realPath = substr($uri, 0, strlen($uri) - strlen($virtualPath));
            else
                $realPath = $_SERVER['SCRIPT_NAME'];
        }
        else
        {
            $realPath = $_SERVER['SCRIPT_NAME'];
        }
        return $this->_scriptPath = $realPath;
    }

    protected function get($varName, $default = "") {
        return isset($_GET[$varName]) ? $_GET[$varName] : $default;
    }
    protected function post($varName, $default = "") {
        return isset($_POST[$varName]) ? $_POST[$varName] : $default;
    }
    protected function cookie($varName, $default = "") {
        return isset($_COOKIE[$varName]) ? $_COOKIE[$varName] : $default;
    }
};
