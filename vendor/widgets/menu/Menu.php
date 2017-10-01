<?php
/**
 * Created by PhpStorm.
 * User: sedoy
 * Date: 01.10.17
 * Time: 19:47
 */

namespace vendor\widgets\menu;


class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container;
    protected $table;
    protected $cache;

    public function __construct()
    {
        $this->run();
    }

    protected function run()
    {
        $this->data = \R::getAssoc("SELECT * FROM categories");
        $this->tree = $this->getTree();
        debug($this->tree);
    }

    protected function getTree()
    {
        $tree = [];
        $data = $this->data;
        foreach ($data as $id=>&$node) {
            if (!$node['parent']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent']]['child'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '')
    {

    }

    protected function catToTemplate($category, $tab, $id)
    {

    }
}