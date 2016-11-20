<?php
	use \yii\helpers\Html;
?>

<?=Html::beginForm('' , 'post' , ['class' => 'form']);?>
<?=\yii\captcha\Captcha::widget([
	//'model' => $model,
	//'attribute' => 'code',
	'name' => 'vcode',
	'captchaAction' => 'captcha/captcha',////验证码的 action 与 Model 是对应的
	'template' => '{input} {image}',
	'options' => [// //input 的 Html 属性配置
            'class' => 'imagecode',
		'id' => 'input'
	],
	'imageOptions' =>[
		'alt' => '点击换验证码',
	]
])?>
<?=Html::submitButton('提交' , ['class'=>'btn btn-primary']);?>
<?=Html::endForm();?>