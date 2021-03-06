<?php
namespace app\controllers;

use app\models\article\Article;
use core\Controller;
use core\Identity;
use core\Url;

class ArticleController extends Controller {
    //构造函数
    public function __construct(array $conf = array())
    {
        //父方法
        parent::__construct($conf);

        //判断登录
        if(Identity::isGuest()) Url::go("/Site/login");
    }

    //列表
    public function index(){
        //获取列表
        $list = Article::findAll();

        //调用视图
        $this->view("article/list",array(
            "list" => $list
        ));
    }

    //修改
    public function update(){
        //参数判断
        if(!isset($_REQUEST["id"])) exit("缺少id;");
        $data = isset($_REQUEST["Article"])?$_REQUEST["Article"]:null;

        //获取模型
        $model = Article::findOne(array("id"=>$_REQUEST["id"]));

        //调用视图
        if($data && $model->load($data) && $model->save()){
            Url::go("index");
        }
        else{
            $this->view("article/update",array(
                "model" => $model
            ));
        }
    }

    //添加
    public function create(){
        //获取数据
        $data = isset($_REQUEST["Article"])?$_REQUEST["Article"]:null;

        //获取模型
        $model = new Article();

        //调用视图
        if($data && $model->load($data) && $model->save()){
            Url::go("index");
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
        if(!isset($_REQUEST["id"]))
            exit("id;");

        //获取模型
        Article::findOne(array("id"=>$_REQUEST["id"]))->delete();

        //跳转到列表页
        Url::go("index");
    }
}