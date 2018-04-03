<?php
namespace app\controllers;

use app\models\user\User;
use core\Controller;
use core\Identity;
use core\Url;

class SiteController extends Controller {
    //登录
    public function login(){
        //获取模型
        $model = new User();

        //获取数据
        $data = isset($_REQUEST["Login"])?$_REQUEST["Login"]:null;

        //尝试登录
        $login = false;
        $fail = false;
        if(!empty($data)){
            $user = User::login($data["username"],$data["password"]);
            if($user){
                Identity::login($user);
                $login = true;
            }
            else{
                $fail = true;
            }
        }

        //调用视图
        if($login){
            $url = Url::to("/");
            header("Location:$url");
        }
        else{
            $this->layout = "login";
            $this->view("site/login",array(
                "model" => $model,
                "fail" => $fail
            ));
        }
    }

    //注销
    public function logout(){
        Identity::logout();
        Url::go("login");
    }
}