<?php

/*
 *
 */

define("DEBUG", 1);

class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_error_handler([$this, 'errorHandler']);
    }

    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        $this->displayError($errno, $errstr, $errfile, $errline);
        return true;
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500)
    {
        http_response_code($response);
        if (DEBUG) {
            require 'views/dev.php';
        } else {
            require 'views/prod.php';
        }
        die;
    }
}

new ErrorHandler();

echo $test;