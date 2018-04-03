<?php
namespace app\controllers;

use app\models\article\Article;
use app\models\document\Document;
use core\ApiResult;
use core\Controller;

class ApiController extends Controller {
    public function articles(){
        $list = Article::findAll();
        ApiResult::sentApiSuccess($list);
    }

    public function article(){
        ApiResult::checkApiParameter(array("id"),1);
        $model = Article::findOne(array("id"=>$_REQUEST["id"]));
        ApiResult::sentApiSuccess($model);
    }

    public function documents(){
        $list = Document::findAll();
        ApiResult::sentApiSuccess($list);
    }

}