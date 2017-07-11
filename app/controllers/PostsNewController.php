<?php

namespace app\controllers;

class PostsNewController extends AppController
{

    /**
     * PostsNew constructor.
     */
    public function indexAction()
    {
        echo 'PostsNew::index';
    }

    public function testAction()
    {
        echo 'PostsNew::test';
    }

    public function testPageAction()
    {
        echo 'PostsNews::testPage';
    }

    public function before()
    {
        echo 'PostsNews::before';
    }
}