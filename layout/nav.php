<?php
use core\Url;

return array(
    1 => array(
        'title' => "用户管理",
        'items' => array(
            1 => array('title' => '用户管理', 'url' => Url::to('/User/index')),
        )
    ),
    2 => array(
        'title' => "文章模块",
        'items' => array(
            1 => array('title' => '文章管理', 'url' => Url::to('/Article/index')),
        )
    ),
    3 => array(
        'title' => "下载文档",
        'items' => array(
            1 => array('title' => '文档列表', 'url' => Url::to('/Document/index')),
        )
    ),
    4 => array(
    'title' => "接口示例",
    'items' => array(
        1 => array('title' => '文章列表', 'url' => Url::to('/Api/articles')),
        2 => array('title' => '文章详情', 'url' => Url::to('/Api/article',array("id"=>"1"))),
        3 => array('title' => '文档列表', 'url' => Url::to('/Api/documents')),
    )
)
);