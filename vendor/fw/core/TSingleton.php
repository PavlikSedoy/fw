<?php
/**
 * Created by PhpStorm.
 * User: sedoy
 * Date: 13.04.17
 * Time: 23:44
 */

namespace fw\core;


trait TSingleton
{
    protected static $instance;

    public static function instance()
    {
        if (self::$instance === null) self::$instance = new self;
        return self::$instance;
    }
}