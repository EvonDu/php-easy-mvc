<?php
    use core\Url;
?>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
    <legend>下载文档</legend>
</fieldset>


<a href="<?php echo Url::to("create")?>" class="layui-btn">添加</a>

<table class="layui-table">
    <colgroup>
        <col width="10%">
        <col width="25%">
        <col>
        <col width="10%">
        <col width="10%">
    </colgroup>
    <thead>
    <tr>
        <th>ID</th>
        <th>名称</th>
        <th>路径</th>
        <th>是否热门</th>
        <th>是否开放</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($list as $model):?>
            <tr>
                <td><?php echo $model->id?></td>
                <td><?php echo $model->name?></td>
                <td><?php echo $model->path?></td>
                <td><?php echo $model->isHot?"true":"false"?></td>
                <td><?php echo $model->isOpen?"true":"false"?></td>
                <td>
                    <a href="<?php echo Url::to("update",array("id"=>$model->id))?>">修改</a>
                    <a href="javascript:remove('<?php echo Url::to("delete",array("id"=>$model->id))?>')">删除</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<script>
    function remove(url){
        layui.use('layer', function(){
            layer.confirm('是否要删除!?', {
                btn: ['确认', '取消']
            }, function(index, layero){
                location.href = url;
            }, function(index){});
        });
    }
</script>