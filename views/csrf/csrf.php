

<form action="" method="post" >
    <input name="title" value="hello csrf"  type="text"/>
    <!--Yii中表单提交必须要有_csrf的值，防止被CSRF攻击-->
    <input type="hidden" name="_csrf" value="<?=$csrfToken;?>" />
    <input type="submit" value="提交"/>
</form>
