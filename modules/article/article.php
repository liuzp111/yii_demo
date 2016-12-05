<?php

namespace app\modules\article;

class article extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\article\controllers';

    public function init()
    {
        parent::init();
        //在父模块中配置子模块http://127.0.0.1/Yii/yii2-demo/web/index.php?r=article/category/default/index
        $this->modules = [
            'category' => [
                   'class' => 'app\modules\article\modules\category\category',
               ],            
        ];
        // custom initialization code goes here
    }
}
