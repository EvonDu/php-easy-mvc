<?php
namespace app\models\document;

use core\Models;

class Document extends Models {
    public $id;
    public $name;
    public $path;
    public $isHot;
    public $isOpen;

    static public function getTable(){
        return "document";
    }

    static public function attributeLabels()
    {
        return array(
            'id'=>"ID",
            'name'=>"文件名",
            'path'=>"文件路径",
            'isHot'=>"是否热门",
            'isOpen'=>"是否开放",
        );
    }

    public function beforeSave()
    {
        return parent::beforeSave(); // TODO: Change the autogenerated stub
    }
}