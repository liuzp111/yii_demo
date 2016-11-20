<?php
	use yii\helpers\Html;
?>
<!---
    1、beginForm的第一个参数是请求提交的url,不填即表示本控制器的本方法
    2、上传的form必须是multipart/form-data，否则是上传不了的
---->
<?=Html::beginForm('' , 'post' , ['enctype' => 'multipart/form-data']);?>
	<?=Html::activeFileInput($upload , 'uploadFile' , ['class' => 'file'])?>
	<?=Html::submitButton('上传' , ['class' => 'btn btn-primary']);?>
<?=Html::endForm();?>