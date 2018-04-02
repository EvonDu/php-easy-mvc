<?php
namespace app\controllers;

use app\models\article\Article;
use core\Controller;
use core\App;
use core\Url;

class ArticleController extends Controller {
    //列表
    public function index(){
        //获取列表
        $model = new Article();
        $list = $model->findAll();

        //调用视图
        $this->view("article/list",array(
            "list" => $list
        ));
    }

    //修改
    public function update(){
        //参数判断
        if(!isset($_REQUEST["a_id"]))
            exit("a_缺少id;");

        //获取模型
        $model = new Article();
        $model = $model->findOne(array("a_id"=>$_REQUEST["a_id"]));

        //获取数据
        $data = isset($_REQUEST["Article"])?$_REQUEST["Article"]:null;

        //调用视图
        if($data && $model->load($data) && $model->save()){
            $url = Url::to("index");
            header("Location:$url");
        }
        else{
            $this->view("article/update",array(
                "model" => $model
            ));
        }
    }

    //添加
    public function create(){
        //获取模型
        $model = new Article();

        //获取数据
        $data = isset($_REQUEST["Article"])?$_REQUEST["Article"]:null;

        //调用视图
        if($data && $model->load($data) && $model->save()){
            $url = Url::to("index");
            header("Location:$url");
        }
        else{
            $this->view("article/create",array(
                "model" => $model
            ));
        }
    }

    //删除
    public function delete(){
        //参数判断
        if(!isset($_REQUEST["a_id"]))
            exit("a_缺少id;");

        //获取模型
        $model = new Article();
        $model = $model->findOne(array("a_id"=>$_REQUEST["a_id"]));
        $model->delete();

        //跳转到列表页
        $url = Url::to("index");
        header("Location:$url");
    }
}