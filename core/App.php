<?php
namespace core;

class App{
    static $conf = array();

    static private function init(){
        self::$conf = array_merge(
            include("./config/app.php"),
            include("./config/database.php")
        );
    }

    static public function run(){
        //初始化
        self::init();
        Identity::init(self::$conf);

        //路由
        self::route();
    }

    static private function route(){
        //获取调用方法
        list($class,$function) = self::getClassFunction();
        //判断类是否存在
        if(class_exists($class)){
            $controller = new $class();
            //判断方式是否存在
            if(method_exists($controller,$function))
                $controller->$function();
            else
                echo $class."未定义方法:".$function;
        }
        else{
            //输出
            echo $class."不存在";
            //DEBUG
            //var_dump($class);
            //var_dump($function);
            //输出404
            //header("HTTP/1.1 404 Not Found");
            //header("Status: 404 Not Found");
            exit;
        }
    }

    //region 路由方法

    static public function getUri(){
        //获得请求地址
        $root = $_SERVER['SCRIPT_NAME'];
        $request = $_SERVER['REQUEST_URI'];
        //获得index.php 后面的地址
        //下面判断用来防止省略index.php时，$request不包含index.php但root包含，导致路由错误
        $url = ($root < $request)?trim(str_replace($root, '', $request), '/'):"";
        //去除参数
        if($paramsIndex = strpos($url,"?"))
            $url = substr($url,0,$paramsIndex);
        //返回
        if($url){
            //获取URI
            $uri = explode('/', $url);
            //返回
            return $uri;
        }
        else{
            //获取默认URI
            $uri = explode("/",self::$conf["app"]["home"]);
            return $uri;
        }
    }

    static public function getClassUri(){
        //获取URI
        $uri = self::getUri();
        $uri2 = $uri;
        array_pop($uri2);
        //合成类全名
        $fullname = "app\\controllers\\".implode('\\',$uri)."Controller";
        $fullname2 = "app\\controllers\\".implode('\\',$uri2)."Controller";
        //判断
        if(class_exists($fullname)){
            return $uri;
        }
        else if(class_exists($fullname2)){
            return $uri2;
        }
        else{
            return null;
        }
    }

    static public function getClassFunction(){
        //获取URI
        $uri = self::getUri();
        $uri_class = self::getClassUri();

        //获取Class和Function
        $class = "app\\controllers\\".implode('\\',$uri_class)."Controller";
        if(count($uri) == count($uri_class) || empty($uri_class))
            $function = "index";
        else
            $function = array_pop($uri);

        //返回
        return array($class,$function);
    }

    //endregion
}