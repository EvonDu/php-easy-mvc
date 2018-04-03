<?php
namespace app\controllers;

use app\models\document\Document;
use core\Controller;
use core\Identity;
use core\Url;

class DocumentController extends Controller {
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
        $list = Document::findAll();

        //调用视图
        $this->view("document/list",array(
            "list" => $list
        ));
    }

    //修改
    public function update(){
        //参数判断
        if(!isset($_REQUEST["id"])) exit("缺少id;");
        $data = isset($_REQUEST["Document"])?$_REQUEST["Document"]:null;

        //获取模型
        $model = new Document();
        $model = $model->findOne(array("id"=>$_REQUEST["id"]));

        //调用视图
        if($data && $model->load($data) && $model->save()){
            Url::go("index");
        }
        else{
            $this->view("document/update",array(
                "model" => $model
            ));
        }
    }

    //添加
    public function create(){
        //获取模型
        $model = new Document();

        //获取数据
        $data = isset($_REQUEST["Document"])?$_REQUEST["Document"]:null;

        //调用视图
        if($data && $model->load($data) && $model->save()){
            Url::go("index");
        }
        else{
            $this->view("document/create",array(
                "model" => $model
            ));
        }
    }

    //删除
    public function delete(){
        //参数判断
        if(!isset($_REQUEST["id"]))
            exit("缺少id;");

        //获取模型
        Document::findOne(array("id"=>$_REQUEST["id"]))->delete();

        //跳转到列表页
        Url::go("index");
    }
}