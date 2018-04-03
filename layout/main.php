<?php
    use core\Url;
    use core\Identity;
    $nav = include("nav.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理</title>
    <link rel="stylesheet" href="<?php echo WEBROOT?>/assets/layui/css/layui.css">
    <script src="<?php echo WEBROOT?>/assets/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo WEBROOT?>/assets/layui/layui.js"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
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
            <?php if(Identity::isGuest()):?>
                <li class="layui-nav-item"><a href="<?php echo Url::to('/Site/logout')?>">登出</a></li>
            <?php endif;?>
            <?php if(!Identity::isGuest()):?>
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <?php echo Identity::user()->name?>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="">基本资料</a></dd>
                        <dd><a href="">安全设置</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="<?php echo Url::to('/Site/logout')?>">登出</a></li>
            <?php endif;?>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item"><a href="#">主页</a></li>
                <?php foreach ($nav as $item):?>
                    <li class="layui-nav-item">
                        <a class="" href="javascript:;"><?php echo $item["title"]?></a>
                        <?php if($item['items']):?>
                        <dl class="layui-nav-child">
                            <?php foreach ($item['items'] as $item2):?>
                            <dd><a href="<?php echo $item2["url"]?>"><?php echo $item2["title"]?></a></dd>
                            <?php endforeach;?>
                        </dl>
                        <?php endif;?>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <?php echo $this->content()?>
        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;
    });
</script>
</body>
</html>