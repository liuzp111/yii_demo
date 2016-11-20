<!-- 片段缓存嵌套 -->
<!-- 片段缓存的嵌套使用有时会产生一些问题：比如给内外的beginCache都设上一个缓存有效时间duration。
    第1次刷新浏览器时，outer和inner里的内容都被缓存了;在20内，如果此时修改了inner里的缓存内容，
    再次刷新浏览器，inner里修改后的缓存内容不会被显示，这是因为在20秒有效期内，PHP只解析了outer的缓存(没过期直接抛出缓存数据)，
    没有去解析inner的缓存(尽管inner缓存的有效期已过并且缓存内容修改了);只有当outer的20秒有效期过期，此时刷新浏览器，
    inner里被修改过的缓存内容才会被显示出来。
-->
<?php if($this->beginCache('cache_div',['duration'=>20])){?>

<div id='cache_outer_div'>
	<div>这里是外层，待会会被缓存</div>
</div>
	
	<?php if($this->beginCache('cache_inner_div',['duration'=>1])){?>
	<div id='cache_inner_div'>
	<div>这里是内层，待会会被缓存00 </div>
	</div>
	<?php 
		$this->endCache();
	}
	?>
	
<?php 
	$this->endCache();
}
?>