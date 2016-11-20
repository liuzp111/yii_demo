<?php
	use \yii\helpers\Html;
?>

<?=Html::beginForm('' , 'post' , ['class' => 'form']);?>
<?=\yii\captcha\Captcha::widget([
	'model' => $model,
	'attribute' => 'vcode',
	'captchaAction' => 'captcha/captcha',
	'template' => '{input} --- {image}',
	'options' => [
		'id' => 'input'
	],
	'imageOptions' =>[
		'alt' => '点击换验证码',
	]
])?>
<?=Html::submitButton('提交' , ['class'=>'btn btn-primary']);?>
<?=Html::endForm();?>