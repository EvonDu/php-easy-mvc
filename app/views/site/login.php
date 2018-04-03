<form class="layui-form" method="post">
    <input type="hidden" name="id" value="<?php echo $model->id?>">

    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-block">
            <input type="text" name="Login[username]" lay-verify="title" autocomplete="off" placeholder="请输入用户名" class="layui-input" value="<?php echo $model->username?>">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-block">
            <input type="password" name="Login[password]" lay-verify="title" autocomplete="off" placeholder="请输入密码" class="layui-input" value="<?php echo $model->name?>">
        </div>
    </div>

    <?php if($fail):?>
    <div class="layui-form-item">
        <p style="text-align: center;color: red">账号或密码错误,请重新尝试</p>
    </div>
    <?php endif;?>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="*">立即提交</button>
            <button class="layui-btn layui-btn-primary" onclick="window.history.back();">返回</button>
        </div>
    </div>
</form>