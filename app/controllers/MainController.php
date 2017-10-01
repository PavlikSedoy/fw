<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\App;
use vendor\core\base\View;

class MainController extends AppController
{
//    public $layout = 'main';

    /**
     * PostsNew constructor.
     */
    public function indexAction()
    {
//        \R::fancyDebug('true');
        $model = new Main();
//        trigger_error(error_msg: "E_USER_ERROR", error_type: E_USER_ERROR);
//        $res = $model->query("CREATE TABLE posts SELECT * FROM shop.goods");
//        $posts = $model->findAll();
//        $post = $model->findOne(2);
//        $postsSeveral = $model->findSeveral(2);
//        $postTitle = $model->findOne('Asus K501ux', 'name');
//        $data = $model->findBySql("SELECT * FROM {$model->table} ORDER BY id DESC LIMIT 2 ");
//        $data2 = $model->findBySql("SELECT * FROM {$model->table} WHERE name LIKE ? ", ['%pp%']);
//        $data = $model->findLike('pp', 'name');
//        debug($data);

//        $posts = App::$app->cache->get('posts');
//        if (!$posts) {
//            $posts = \R::findAll('posts');
//            App::$app->cache->set('posts', $posts, 3600*24);
//        }
        $posts = \R::findAll('posts');
//        echo date('Y-m-d H:i', time());
//        echo '<br>';
//        echo date('Y-m-d H:i', 1492101657);
        $post = \R::findOne('posts', 'id = 1');
        $menu = $this->menu;
//        $this->setMeta('Главная страница', 'Описание главной страницы', 'Ключевые слова главной страницы');
//        $meta = $this->meta;
        View::setMeta('Главная страница', 'Описание главной страницы', 'Ключевые слова главной страницы');
        $title = 'PAGE TITLE';
        $this->set(compact('title', 'posts', 'menu', 'meta'));
//        App::$app->getList();
    }

    public function testAction()
    {
        if ($this->isAjax()) {
            $model = new Main();
            $post = \R::findOne('posts', "id = {$_POST['id']}");
            $this->loadView('_test', compact('post'));
            die;
        }
        $menu = $this->menu;
//        $this->setMeta('Тестовая страница', 'Описание тестовой страницы', 'Ключевые слова тестовой страницы');
//        $meta = $this->meta;
        View::setMeta('Тестовая страница', 'Описание тестовой страницы', 'Ключевые слова тестовой страницы');
        $this->set(compact('menu', 'meta'));
//        $this->layout = false;
    }

}