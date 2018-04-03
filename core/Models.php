<?php
namespace core;

class Models{
    //region 模型属性

    //设置表名
    static public function getTable(){
        return "";
    }

    //设置主键名
    static public function getPk(){
        return "id";
    }

    //属性名设置
    static public function attributeLabels()
    {
        return array();
    }

    //获取属性名
    static public function attributeLabel($field){
        $class = get_called_class();
        $lables = $class::attributeLabels();
        if(array_key_exists($field,$lables))
            return $lables[$field];
        else
            return $field;
    }

    //加载
    public function load($data = array()){
        //获取所有属性
        $propertys = array_keys(get_object_vars($this));
        unset($propertys["table"]);
        unset($propertys["pk"]);

        //加载变量
        foreach ($propertys as $key){
            if(array_key_exists($key,$data))
                $this->$key = $data[$key];
        }

        //返回
        return true;
    }

    //endregion;

    //region 数据操作

    //连接数据库
    static public function connect(){
        //$dsn
        $dbms = App::$conf['database']['dbms'];
        $host = App::$conf['database']['host'];
        $dbName = App::$conf['database']['dbName'];
        $user = App::$conf['database']['user'];
        $pass = App::$conf['database']['pass'];
        $dsn = "$dbms:host=$host;dbname=$dbName";

        //连接数据库
        try {
            $dbh = new \PDO($dsn, $user, $pass,array(\PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
        }
        catch (\PDOException $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }

        //返回连接
        return $dbh;
    }

    //查询构造
    static public function find($condition = array()){
        //设置SQL
        $class = get_called_class();
        $table = $class::getTable();
        $sql = "SELECT * from $table";

        //添加条件
        $sql = self::loadCondition($sql,$condition);

        //查询结果
        $result = self::connect()->prepare($sql);//准备查询语句
        $result->execute();

        //返回查询结果
        return $result;
    }

    //查询列表
    static public function findAll($condition = array()){
        //查询
        $result = self::find($condition);

        //处理查询结果
        $list = array();
        $search = $result->fetchAll();
        if($search){
            foreach ($search as $row) {
                //$class = get_class($this);
                $class = get_called_class();
                $model = new $class();
                $model->load($row);
                $list[] = $model;
            }
        }

        //返回查询结果
        return $list;
    }

    //查询单个
    static public function findOne($condition = array()){
        //查询
        $result = self::find($condition);

        //获取结果
        $search = $result->fetch();

        //处理结果并返回
        if($search){
            $class = get_called_class();
            $model = new $class();
            $model->load($search);
            return $model;
        }
        else{
            return null;
        }
    }

    //保存
    public function save(){
        //生命周期
        $this->beforeSave();

        //处理属性
        $data = $this->getSaveData();
        if(!$data) return true;

        //设置SQL
        $table = $this->getTable();
        $sql = "REPLACE INTO $table(";
        if($data){
            $f = true;
            foreach ($data as $key => $value){
                if($f)
                    $f = false;
                else
                    $sql.=",";
                $sql.="`$key`";
            }
        }
        $sql .=")VALUES(";
        if($data){
            $f = true;
            foreach ($data as $key => $value){
                if($f)
                    $f = false;
                else
                    $sql.=",";
                $sql.="'$value'";
            }
        }
        $sql .=")";

        //查询结果
        $result = $this->connect()->prepare($sql);//准备查询语句
        $result->execute();

        //返回查询结果
        return $result;
    }

    //删除
    public function delete(){
        //获取参数
        $table = $this->getTable();
        $pk = $this->getPk();

        //判断有效
        if(!$this->$pk)
            return false;

        //设置SQL
        $value = $this->$pk;
        $sql = "DELETE FROM $table WHERE $pk='$value'";

        //查询结果
        $result = $this->connect()->prepare($sql);//准备查询语句
        $result->execute();

        //返回结果
        return $result;
    }

    //endregion

    //region 辅助方法

    //载入条
    static private function loadCondition($sql, $condition = array()){
        //添加条件
        if($condition){
            $f = true;
            foreach ($condition as $key => $value){
                if($f){
                    $sql .= " Where $key = '$value'";
                    $f = false;
                }
                else{
                    $sql .= " And $key = '$value'";
                }
            }
        }

        //返回sql
        return $sql;
    }

    //出去空参数
    private function getSaveData(){
        $result = array();
        foreach (get_object_vars($this) as $key=>$value){
            if($value != null){
                $result[$key]=$value;
            }
        }
        return $result;
    }

    //endregion

    //region 生命周期

    protected function beforeSave(){
        return true;
    }

    //endregion
}