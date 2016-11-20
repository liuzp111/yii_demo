<?php
	use yii\helpers\Url;//使用URL 帮助类
?>
<p style="text-align:right;">
	<a href="<?=Url::to(['add'])?>" class="btn btn-primary">添加</a>
</p>
<table class="table table-hover">
<tr>
	<th>id</th>
        <th>标题</th>
        <th>浏览次数</th>
        <th>状态</th>
        <th>添加时间</th>
        <th>操作</th>
</tr>
<?php foreach($data as $v){?>
<tr>
	<td><?=$v->id?></td>
        <td><?=$v->title?></td>
	<td><?=$v->count?></td>
        <td><?=($v->status == '1' ? '展示' : '不展示')?></td>
	<td><?=date("Y-m-d H:i:s" ,$v->update_date)?></td>
        <td><a href="<?=Url::to(['edit' , 'id'=>$v->id])?>">编辑</a> | <a href="<?=Url::to(['delete' , 'id'=>$v->id])?>">删除</a></td>
</tr>
<?php }?>
</table>
<div style="float:right;">
<?=\yii\widgets\LinkPager::widget([
	'pagination' => $pagination,
	'options' => [
		'class' => 'pagination',
		]
]);?>
</div>
