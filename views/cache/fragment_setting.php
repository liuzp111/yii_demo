<!-- 片段缓存设置： -->
<?php
//1.设置缓存有效时间，失效之后重新读取cache_div里的内容
//$duration = 15;
//2.片段缓存依赖设置：定义一个数组，数组里要有一个class去指定使用哪种依赖
/* $dependency = [
  'class' => 'yii\caching\FileDependency',
  'fileName' =>'hw.txt'
  ]; */
//3.缓存开关设置：指定缓存用不用
$enabled = true; //传递true 或 false 开启和关闭缓存
?>
<!-- 1.通过beginCache('缓存数据的名字','数组['key'=>'value']')的第2个参数(是一个数组)设置缓存有效时间，duration：有效期 -->
 <!--<?//php if($this->beginCache('cache_div',['duration'=>$duration])){?>--> 
<!-- 2.刷新浏览器，cache_div里的内容被缓存起来。当修改cache_div里的内容时，再次刷新浏览器，显示的还是缓存的内容。只有修改了$dependency对象关联的缓存依赖的文件hw.txt里的内容，再次刷新浏览器cache_div里修改后的内容才会被显示出来。 -->
<!-- <?//php if($this->beginCache('cache_div',['dependency'=>$dependency])){?> -->
<!-- 3.$enabled为false，那么cache_div不会被缓存，内容是什么就显示什么; $enabled为true，第一次刷新浏览器会把cache_div里的内容缓存起来，之后修改cache_div的内容，刷新浏览器还是会显示之前缓存的cache_div的内容-->
<?php 
    if ($this->beginCache('cache_div', ['enabled' => $enabled])) 
    {
?>
    <div id='cache_div'>
        <div>这里待会会被缓存0</div>
    </div>
<?php
    $this->endCache();
}
?>