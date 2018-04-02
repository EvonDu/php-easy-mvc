<?php
namespace core;

class View{
    //参数
    private $path;
    private $params;

    //构造方法
    function __construct($path,$params=array()){
        $this->path = $path;
        $this->params = $params;
    }

    //输出视图
    function run(){
        //引入布局
        require(APPPATH."/layout/main.php");
    }

    //获取页面内容(layout内)
    function content(){
        //释放参数
        if($this->params){
            foreach ($this->params as $key=>$value){
                $$key = $value;
            }
        }

        //引入内容
        require(APPPATH."app/views/$this->path.php");;
    }
}