<!-- 使用视图组件($this)里的beginCache('缓存数据的名字')方法把cache_div给缓存起来;
    这个方法开启会检查当前有没有缓存，如果没有返回false 
-->
<!-- 如何证明cache_div的代码片段被缓存了呢？ 在两个div里都添加上相同的内容。
    如果cache_div被缓存起来将会使用缓存里的内容，而不会使用修改后的内容。提高了程序的运行效率。
-->
<?php 
    if($this->beginCache('cache_div'))
    {
?>
        <div id='cache_div'>
                <div>这里待会会被缓存(这里是缓存过后添加的)测试是否缓存</div>
        </div>
<?php 
	$this->endCache();//结束缓存
    }
?>

    <div id='no_cache_div'>
            <div>这里不会被缓存(这里是缓存过后添加的)测试是否缓存</div>
    </div>
