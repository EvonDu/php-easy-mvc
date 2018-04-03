<?php
use core\Url;
?>

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
        <label class="layui-form-label">封面</label>
        <div class="layui-input-block">
            <img id="update-images" width="175px" height="175px" <?php echo $model->image?"src='$model->image'":'' ?>">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"></label>
        <div class="layui-input-block">
            <button type="button" class="layui-btn" id="update-button"><i class="layui-icon">&#xe67c;</i>上传图片</button>
            <input type="hidden" name="Article[image]" value="<?php echo $model->image?>">
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
    layui.use('upload', function(){
        var upload = layui.upload;
        //执行实例
        var uploadInst = upload.render({
            elem: '#update-button',
            accept: 'file',
            url: '<?php echo Url::to("/Public/layuiUpload")?>',
            done: function(res){
                //上传完毕回调
                if(res.code == 0){
                    if(res.data.src)
                        $("#update-images").attr("src" ,res.data.src);
                    $("input[name='Article[image]']").val(res.data.src);
                }
            },
            error: function(){
                //请求异常回调
            }
        });
    });
</script>