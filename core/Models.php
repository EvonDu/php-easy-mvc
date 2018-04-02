<?php
namespace core;

class Models{
    //设置表名
    public function getTable(){
        return "";
    }

    //设置主键名
    public function getPk(){
        return "id";
    }

    //属性名设置
    public function attributeLabels()
    {
        return array();
    }

    //获取属性名
    public function attributeLabel($field){
        $lables = $this->attributeLabels();
        if(array_key_exists($field,$lables))
            return $lables[$field];
        else
            return $field;
    }

    //加载
    public function load($data = array()){
        //获取所有属性
        $propertys = array_keys(get_object_vars($this));

        //加载变量
        foreach ($propertys as $key){
            if(array_key_exists($key,$data))
                $this->$key = $data[$key];
        }

        //返回
        return true;
    }

    //region 数据操作

    //连接数据库
    public function connect(){
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
    public function find($condition = array()){
        //设置SQL
        $table = $this->getTable();
        $sql = "SELECT * from $table";

        //添加条件
        $sql = $this->loadCondition($sql,$condition);

        //查询结果
        $result = $this->connect()->prepare($sql);//准备查询语句
        $result->execute();

        //返回查询结果
        return $result;
    }

    //查询列表
    public function findAll($condition = array()){
        //查询
        $result = $this->find($condition);

        //处理查询结果
        $list = array();
        $search = $result->fetchAll();
        if($search){
            foreach ($search as $row) {
                $class = get_class($this);
                $model = new $class();
                $model->load($row);
                $list[] = $model;
            }
        }

        //返回查询结果
        return $list;
    }

    //查询单个
    public function findOne($condition = array()){
        //查询
        $result = $this->find($condition);

        //获取结果
        $search = $result->fetch();
        $class = get_class($this);
        $model = new $class();
        $model->load($search);

        //返回查询结果
        return $model;
    }

    //保存
    public function save(){
        $this->beforeSave();

        return $this->replace();
    }

    //替换
    public function replace(){
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
    private function loadCondition($sql, $condition = array()){
        //添加条件
        if($condition){
            $f = true;
            foreach ($condition as $key => $value){
                if($f){
                    $sql .= " Where $key = $value";
                    $f = false;
                }
                else{
                    $sql .= " And $key = $value";
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