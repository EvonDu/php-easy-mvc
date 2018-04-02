<?php
namespace core;

class Controller{
    //配置
    private $conf;

    //构造函数
    public function __construct($conf=array()){
        $this->conf = $conf;
    }

    //调用视图
    public function view($path,$params=array()){
        $view = new View($path,$params);
        $view->run();
    }
}