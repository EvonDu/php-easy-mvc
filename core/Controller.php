<?php
namespace core;

class Controller{
    //配置
    private $conf;
    protected $layout;

    //构造函数
    public function __construct($conf=array()){
        $this->conf = $conf;
        $this->layout = App::$conf["app"]["layout"];
    }

    //调用视图
    public function view($path,$params=array()){
        $view = new View($path,$this->layout,$params);
        $view->run();
    }
}