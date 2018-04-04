<?php
use core\Url;
use \core\Identity;
$nav = include("nav.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>用户登录</title>
    <link rel="stylesheet" href="<?php echo WEBROOT?>/assets/layui/css/layui.css">
    <script src="<?php echo WEBROOT?>/assets/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo WEBROOT?>/assets/layui/layui.js"></script>
</head>
<body class="layui-layout-body">

<div class="layui-layout layui-layout-admin layou">
    <div class="layui-header">
        <div class="layui-logo">后台管理</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">控制台</a></li>
            <li class="layui-nav-item"><a href="">商品管理</a></li>
            <li class="layui-nav-item"><a href="">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item"><a href="<?php echo Url::to('/Site/login')?>">登录</a></li>
        </ul>
    </div>
</div>

<div style="padding: 32px">
    <fieldset class="layui-elem-field site-demo-button" style="max-width: 600px;margin: auto">
        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li class="layui-this">用户登录</li>
            </ul>
            <div class="layui-tab-content" style="padding-top: 32px;padding-left: 18px;padding-right: 18px">
                <?php echo $this->content()?>
            </div>
        </div>
    </fieldset>
</div>

<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;
    });
</script>
</body>
</html>