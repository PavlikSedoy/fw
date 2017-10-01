<?php
/**
 * Created by PhpStorm.
 * User: sedoy
 * Date: 13.04.17
 * Time: 17:54
 */

namespace vendor\core;

use vendor\core\Registry;
use vendor\core\ErrorHandler;


class App
{
    public static $app;

    /**
     * App constructor.
     */
    public function __construct()
    {
        self::$app = Registry::instance();
        new ErrorHandler();
    }


}