<?php
use core\Url;
?>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
    <legend>添加用户</legend>
</fieldset>

<form class="layui-form" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-block">
            <input type="text" name="User[username]" lay-verify="title" autocomplete="off" placeholder="请输入用户名" class="layui-input" value="<?php echo $model->username?>">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-block">
            <input type="text" name="User[password]" lay-verify="title" autocomplete="off" placeholder="请输入密码" class="layui-input" value="<?php echo $model->password?>">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">名称</label>
        <div class="layui-input-block">
            <input type="text" name="User[name]" lay-verify="title" autocomplete="off" placeholder="请输入名称" class="layui-input" value="<?php echo $model->password?>">
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="*">立即提交</button>
            <button class="layui-btn layui-btn-primary" onclick="window.history.back();">返回</button>
        </div>
    </div>
</form>

<!-- 脚本 -->
<script>
    layui.use('form', function(){
        var form = layui.form;
        //监听提交
        form.on('submit(*)', function(data){});
    });
</script>