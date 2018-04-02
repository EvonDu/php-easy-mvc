<?php
    use core\Url;
?>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
    <legend>文章列表</legend>
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
        <th>标题</th>
        <th>介绍</th>
        <th>创建时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($list as $model):?>
            <tr>
                <td><?php echo $model->a_id?></td>
                <td><?php echo $model->title?></td>
                <td><?php echo $model->intro?></td>
                <td><?php echo date("Y-m-d",$model->create_time)?></td>
                <td>
                    <a href="<?php echo Url::to("update",array("a_id"=>$model->a_id))?>">修改</a>
                    <a href="javascript:remove('<?php echo Url::to("delete",array("a_id"=>$model->a_id))?>')">删除</a>
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