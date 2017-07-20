<?php
/**
 * Created by PhpStorm.
 * User: sedoy
 * Date: 06.04.17
 * Time: 20:37
 */

namespace app\controllers;


use app\models\Main;
use vendor\core\base\Controller;

class AppController extends Controller
{
    public $menu;
    public $meta = [];

    public function __construct($route) 
    {
        parent::__construct($route);

        new Main();

        $this->menu = \R::findAll('category');
    }

    protected function setMeta($title = '', $description = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['description'] = $description;
        $this->meta['keywords'] = $keywords;
    }

}