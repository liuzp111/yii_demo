<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

</head>
<body>
    <h1>common文件</h1>
    <?php if(isset($this->blocks['block1'])):?>
        <?=$this->blocks['block1'];?>
   <?php else: ?> 
        <h1>使用默认数据块common文件</h1>
   <?php endif; ?> 

    <?=$content;?>  
</body>
</html>
