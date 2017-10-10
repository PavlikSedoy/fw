<?php
/**
 * Created by PhpStorm.
 * User: sedoy
 * Date: 05.04.17
 * Time: 20:40
 */

function debug($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function redirect($http = false)
{
    if ($http) $redirect = $http;
    else $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
    header("Location: $redirect");
    exit;
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}