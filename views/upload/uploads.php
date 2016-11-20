<?php
	use yii\helpers\Html;
?>
<!--多文件上传的图片名称必须加[]，以数组方式传参-->
<?=Html::beginForm('' , 'post' , ['enctype' => 'multipart/form-data']);?>
	<?=Html::activeFileInput($uploads , 'uploadFile[]' , ['class' => 'file'])?>
	<?=Html::activeFileInput($uploads , 'uploadFile[]' , ['class' => 'file'])?>
	<?=Html::activeFileInput($uploads , 'uploadFile[]' , ['class' => 'file'])?>
	<?=Html::submitButton('上传' , ['class' => 'btn btn-primary']);?>
<?=Html::endForm();?>