<?php
    use yii\helpers\Html;
    
    
?>

<?=Html::beginForm('','post',['id'=>'addForm','class'=>'form','data'=>'fm']);?>
<!--将生成的Html-->
<!--<form id="addForm" class="form" action="/Yii/yii2-demo/web/index.php?r=test/index" method="post" data="fm">
<input type="hidden" name="_csrf" value="aVo1NkFFV09cbkwPHigmegMxDHEoK2YoIWIYWSINZx9fMGBkDTwmOA==">
</form>-->

<?= Html::input('text','name','fuck value',['class'=>'input']);?>
<?= Html::input('password','pwd','',['class'=>'input password']);?>
<?= Html::input('hidden','hide','',['class'=>'input hidden']);?>

<hr/>
<!--上面的生成方式和下方的方式等价-->
<?=Html::textInput('name','fuck value',['class'=>'input']);?>
<?=Html::passwordInput('pwd','',['class'=>'input password']);?>
<?=Html::hiddenInput('hidden','',['class'=>'input hidden']);?>

<hr/>

<?= Html::textarea('intro', '我是文本', ['class'=>'intro']);?>

<?= Html::radioList('fav',1,[1=>'test',2=>'mrs'],['class'=>'fav-list']);?>

<?=Html::checkbox('checkbox_name',FALSE,['class'=>'ckbox']);?>

<?= Html::dropDownList('sts',2 , [1=>'是',2=>'否'],['class'=>'sts']);?>


<?= Html::label('name','uname',['class'=>'lable']);?>

<?= Html::fileInput('image', NULL, ['class'=>'upload']);?>

<?= Html::button('按钮',['class'=>'btn']);?>

<?= Html::submitButton('提交按钮',['class'=>'btn-submit']);?>
<?= Html::resetButton('重置按钮',['class'=>'btn-reset']);?>


<?= Html::activeInput('text', $model, 'title',['class'=>'input']);?>


<?=Html::endForm();?>


