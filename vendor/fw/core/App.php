<?php
/**
 * Created by PhpStorm.
 * User: sedoy
 * Date: 13.04.17
 * Time: 17:54
 */

namespace fw\core;

use fw\core\Registry;
use fw\core\ErrorHandler;


class App
{
    public static $app;

    /**
     * App constructor.
     */
    public function __construct()
    {
        session_start();
        self::$app = Registry::instance();
        new ErrorHandler();
    }


}