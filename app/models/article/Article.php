<?php
namespace app\models\article;

use core\Models;

class Article extends Models {
    public $a_id,$title,$create_time,$intro,$content,$img;

    public function getTable(){
        return "article";
    }

    public function getPk()
    {
        return "a_id";
    }

    public function attributeLabels()
    {
        return array(
            'a_id'=>"ID",
            'title'=>"标题",
            'create_time'=>"创建时间",
            'intro'=>"介绍",
            'content'=>"内容",
            'img'=>"封面",
        );
    }

    public function beforeSave()
    {
        $this->create_time = time();

        return parent::beforeSave(); // TODO: Change the autogenerated stub
    }
}