<?php
//加载
include "vendor/autoload.php";

//引入
use core\App;

//常量
define('APPPATH', trim(__DIR__ . '/'));
define("WEBROOT",str_replace("index.php","",$_SERVER["SCRIPT_NAME"]));

//设置报错等级
error_reporting(E_ALL^E_NOTICE^E_WARNING);

//执行
App::run();