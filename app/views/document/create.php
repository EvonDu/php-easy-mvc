<?php
use core\Url;
?>

<!-- summernote -->
<link rel="stylesheet" href="<?php echo WEBROOT?>/assets/summernote/summernote.css">
<script src="<?php echo WEBROOT?>/assets/summernote/summernote.min.js"></script>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
    <legend>添加文档</legend>
</fieldset>

<form class="layui-form" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">文档名称</label>
        <div class="layui-input-block">
            <input type="text" name="Document[name]" lay-verify="title" autocomplete="off" placeholder="请输入名称" class="layui-input" value="<?php echo $model->name?>">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">文档路径</label>
        <div class="layui-input-block">
            <input type="text" name="Document[path]" lay-verify="title" autocomplete="off" placeholder="请上传文件" class="layui-input" value="<?php echo $model->path?>" readonly>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"></label>
        <div class="layui-input-block">
            <button type="button" class="layui-btn" id="update-file"><i class="layui-icon">&#xe67c;</i>上传图片</button>
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
    layui.use('upload', function(){
        var upload = layui.upload;
        //执行实例
        var uploadInst = upload.render({
            elem: '#update-file',
            accept: 'file',
            url: '<?php echo Url::to("/Public/layuiUpload")?>',
            done: function(res){
                //上传完毕回调
                if(res.code == 0){
                    if(res.data.src)
                        $("input[name='Document[path]']").val(res.data.src);
                }
            },
            error: function(){
                //请求异常回调
            }
        });
    });
</script>