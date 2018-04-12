<?php
namespace core;

class ApiResult{
    //检测参数
    static public function checkApiParameter($list,$code){
        foreach($list as $item){
            if(!isset($_REQUEST[$item])){
                self::sentApiError($code,"parameter missing [$item]");
            }
        }
    }

    //返回成功信息
    static public function sentApiSuccess($data = null){
        header('Content-type: application/json');
        $result = self::getResultObject();
        $result->data = $data;
        exit(json_encode($result));
    }

    //返回失败信息
    static public function sentApiError($code, $msg, $data=null){
        header('Content-type: application/json');
        $result = self::getResultObject();
        $result->state->code = $code;
        $result->state->message = $msg;
        $result->data = $data;
        exit(json_encode($result));
    }

    //获取API返回值结构
    static public function getResultObject(){
        //构建返回体
        $result = (object)array(
            "state"=>(object)array(
                "code"=>0,
                "message"=>"OK",
            ),
            "data"=>null
        );

        //返回结构
        return $result;
    }
}