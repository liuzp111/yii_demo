<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<p>我在index.php</p>
<!--1.在一个视图(index.php)中显示另一个试图(about.php)：-->
<?php 
//    echo $this->render('about');
?>

<!--当需要给（about.php）页面传入参数时，用render的第二个参数：
    $this->render('about',array('key'=>'value'))，这样就可以把第二个参数数组传递给about.php这个视图中-->

<?php echo $this->render('about',array('key'=>'this is about value'));?>
<!--$layout = 'common' ; //布局文件
$this 视图组件
如果想替换公共文件中的某段(数据块)，可以在视图文件中使用:-->


<?php $this->beginBlock('block1'); ?>
<h1>..替换common..</h1>
<?php $this->endBlock();?>