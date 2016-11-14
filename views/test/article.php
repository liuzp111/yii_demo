<?php
    use yii\helpers\Html;
?>


<?=Html::beginForm('','post',['id'=>'addForm']);?>
<?=Html::activeInput('text', $model, 'title',['class'=>'input']);?>

<?=Html::activeInput('password', $model, 'title',['class'=>'input']);?>
<?=Html::activeInput('hidden', $model, 'title',['class'=>'input']);?>

<hr/>


<?=Html::activeTextInput($model , 'title' , ['class' => 'input'])?>
<?=Html::activePasswordInput($model , 'title' , ['class' => 'input'])?>
<?=Html::activeHiddenInput($model , 'title' , ['class' => 'input'])?>

<?=Html::activeTextArea($model , 'content' , ['class' => 'textarea'])?>


<?=Html::activeRadio($model , 'status', ['class' =>'status'])?>

<?=Html::activeRadioList($model,'status' , [ '0'=>'显示' , '2' =>'不显示' ] , ['class'=>'st'])?>

<?=Html::activeCheckbox($model , 'status', ['class' =>'status'])?>

<?=Html::activeCheckboxList($model,'status' , [ '2' =>'不显示' , '0'=>'显示' ] , ['class'=>'st'])?>

<?=Html::activeDropDownList($model,'status',[ '1'=>'f','2'=>'m' ] , ['class'=>'sx'])?>



<?=Html::submitButton("提交" , ['class' => 'btn'])?>



<?=Html::endForm();?>