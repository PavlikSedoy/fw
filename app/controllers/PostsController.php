<?php

namespace app\controllers;

class PostsController extends AppController
{
    /**
     * PostsNew constructor.
     */
    public function indexAction()
    {
        echo 'Posts::index';
    }

    public function testAction()
    {
        debug($this->route);
        echo 'Posts::testAction';
    }
}