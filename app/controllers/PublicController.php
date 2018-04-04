<?php
namespace app\controllers;

use core\Controller;
use core\Url;

class PublicController extends Controller {
    //上传图片
    public function layuiUpload()
    {
        if(isset($_FILES['file'])){
            //获取上传文件
            $file = $_FILES['file'];

            //生成文件路径
            $tempname = $file["tmp_name"];                                            //文件位置
            $filename = $file["name"];                                                //文件名
            $date = date("Ymd");                                             //日期
            $dataPath = "upload/$date";                                               //文档路径
            $relativePath = "$dataPath/$filename";                                    //相对路径
            $absolutePath = APPPATH."$relativePath";                                  //物理路径

            //建立文件夹(如果不存在)
            if(!file_exists($dataPath))
                mkdir($dataPath);

            //保存文件
            if(move_uploaded_file($tempname, $absolutePath)){
                //生成URL
                $url = Url::path("$relativePath");
                //生成返回
                $result = array("src"=>$url);
                //返回
                $this->result(0,"success",$result);
            }
            else{
                $this->result(1);
            }
        }
        else{
            $this->result(1);
        }
    }

    //LayuiApi返回
    public function result($code,$msg,$data){
        header('Content-type: application/json');
        $result = array("code"=>$code, "msg"=>$msg, "data"=>$data);
        exit(json_encode($result));

    }
}