<?php

namespace vendor\core;

class Router
{

    /*
     * Таблица маршрутов
     * @var array
     */
    protected static $routes = [];

    /*
     * Текущий маршрут и параметры (controller, action, params)
     * @var array
     */
    protected static $route = [];

    /*
     * Добавляем маршрут в таблицу маршрутов
     *
     * @param string $regexp регулярное выражение маршрута
     * @param array $route маршрут ([controller, action, params])
     */
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    /*
     * Возвращает таблицу маршрутов
     *
     * @return array
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /*
     * Возвращает текущий маршрут (controller, action, [params])
     *
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /*
     * Ищет URL в таблице маршрутов
     *
     * @param string $url - входящий URL
     * @return boolean
     */
    protected static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) $route[$key] = $value;
                }
                if (!isset($route['action'])) $route['action'] = 'index';
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /*
     * Перенаправляем URL по корректному маршруту
     * @param string $url - входящий URL
     * @return void
     */
    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
                $cObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action'] . 'Action');
                if (method_exists($cObj, $action)) {
                    $cObj->$action();
                    $cObj->getView();
                } else {
                    echo "Метод <b>$action</b> не найден";
                }
            } else {
                echo "Контроллер <b>$controller</b> не найден";
            }
        } else {
            http_response_code(404);
            include '404.html';
        }
    }

    /*
     * Преобразует имена к виду CamelCase (Каждое слово с большой буквы, без пробелов)
     */
    protected static function upperCamelCase($name)
    {
        return $name = str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    /*
     * Преобразует имена к виду CamelCase (первое слово с маленькой буквой, следуещие - с большой)
     */
    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }

    public static function removeQueryString($url)
    {
        if ($url) {
            $params = explode('&', $url, 2);
            if (false === strpos($params[0], '=')) {
            return rtrim($params[0], '/');
        }  else {
                return '';
            }
        }
    }

}