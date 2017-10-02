<?php

namespace app\controllers\admin;


use vendor\core\base\View;

class UserController extends AppController
{
    public function indexAction()
    {
        View::setMeta('Админка :: Главная страница', 'Админка :: описание', 'Админка, ключевые, слова');
        $test = 'Тестовая переменная';
        $data = ['test', '2'];
//        $this->set([
//            'test' => $test,
//            'data' => $data,
//        ]);
        $this->set(compact('test', 'data'));
    }

    public function testAction()
    {

    }
}