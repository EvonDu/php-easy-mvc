<!-- summernote -->
<link rel="stylesheet" href="<?php echo WEBROOT?>/assets/summernote/summernote.css">
<script src="<?php echo WEBROOT?>/assets/summernote/summernote.min.js"></script>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
    <legend>添加文章</legend>
</fieldset>

<form class="layui-form" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">标题</label>
        <div class="layui-input-block">
            <input type="text" name="Article[title]" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input" value="<?php echo $model->title?>">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">介绍</label>
        <div class="layui-input-block">
            <input type="text" name="Article[intro]" lay-verify="title" autocomplete="off" placeholder="请输入介绍" class="layui-input" value="<?php echo $model->intro?>">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">内容</label>
        <div class="layui-input-block">
            <textarea id="edit" style="display: none;" name="Article[content]" >
                <?php echo $model->content?>
            </textarea>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" lay-submit>立即提交</button>
            <button class="layui-btn layui-btn-primary" onclick="window.history.back();">返回</button>
        </div>
    </div>
</form>

<!-- 脚本 -->
<script>
    layui.use('layedit', function(){
        var layedit = layui.layedit;
        layedit.build('edit'); //建立编辑器
    });
</script>