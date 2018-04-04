<?php
use core\Url;
?>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
    <legend>修改文档</legend>
</fieldset>

<form class="layui-form" method="post">
    <input type="hidden" name="id" value="<?php echo $model->id?>">

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
            <button type="button" class="layui-btn" id="update-file"><i class="layui-icon">&#xe67c;</i>上传文件</button>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">文档设置</label>
        <div class="layui-input-block">
            <input type="checkbox" name="Document[isOpen]" title="开放" <?php echo $model->isOpen?"checked":""?>>
            <input type="checkbox" name="Document[isHot]" title="热门" <?php echo $model->isHot?"checked":""?>>
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
    layui.use('form', function(){
        var form = layui.form;
        //监听提交
        form.on('submit(*)', function(data){
            //设置checked
            $(data.form).find('input[type="checkbox"]').prop("checked", true);

            //修正值
            if(data.field["Document[isHot]"])
                $(data.form).find('input[name="Document[isHot]"]').val(1);
            else
                $(data.form).find('input[name="Document[isHot]"]').val(0);
            if(data.field["Document[isOpen]"])
                $(data.form).find('input[name="Document[isOpen]"]').val(1);
            else
                $(data.form).find('input[name="Document[isOpen]"]').val(0);

            //DEBUG
            //console.log(data)
            //return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });
    });
</script>