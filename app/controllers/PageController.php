<?php
/**
 * Created by PhpStorm.
 * User: sedoy
 * Date: 06.04.17
 * Time: 15:42
 */

namespace app\controllers;

class PageController extends AppController
{
    public function viewAction()
    {
//        debug($this->route);
//        debug($_GET);
//        echo 'Page::view';

        $menu = $this->menu;
        $title = 'Страница - Page, модель - view';
        $this->set(compact('title', 'menu'));
    }
}