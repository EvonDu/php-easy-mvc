<?php
namespace core;

class Url{
    //获取Url
    static public function to($path,$params = array()){
        //获取class
        $uri = App::getClassUri();
        $uri = implode('/',$uri);;

        //设置url
        if($path[0] === "/")
            $url = $_SERVER["SCRIPT_NAME"]."$path";
        else
            $url = $_SERVER["SCRIPT_NAME"]."/$uri/$path";

        //添加参数
        $url = self::addParams($url,$params);

        //返回
        return $url;
    }

    //跳转Url
    static public function go($path,$params = array()) {
        $url = self::to($path,$params);
        header("Location:$url");
    }

    //获取访问
    static public function path($path){
        return WEBROOT."$path";
    }

    //region 辅助方法

    static private function addParams($url, $params=array()){
        if($params){
            $url.= "?";
            $f = true;
            foreach ($params as $key=>$value){
                if($f){
                    $url.="$key=$value";
                    $f=false;
                }else{
                    $url.="&$key=$value";
                }
            }
        }

        return $url;
    }

    //endregion
}