<!-- 视图之数据安全 -->
<!-- Yii提供了一个工具类Html(在命名空间中的类，需要通过php代码去告诉应用程序去使用yii\helpers\Html;下的这么一个类)，类中有一个方法encode(可以对这个变量当中的js代码进行转义) -->
<?php 
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<!--未经过过滤的代码 -->
<?=$view_hello_str;?>

<h1><?=Html::encode($view_hello_str);?></h1> <!-- js代码会被原样的显示出来 -->

<!-- 除了通过转义的方式去避免跨站脚本攻击之外，还可以通过另外一个类HtmlPurifier去过滤js代码 -->
<h1><?=HtmlPurifier::process($view_hello_str);?></h1> <!-- process方法可以把变量里的js代码给彻底过滤

