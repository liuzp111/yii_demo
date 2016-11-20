<?php

//app指的是网站根目录

namespace app\controllers;

use yii\web\Controller;
use yii\helpers\Url;    
/**
 * Request组件和验证学习
 */
class LayoutsController extends Controller{
    public $layout = 'common';//指定布局的文件
    public function actionIndex()
    {
        
        return $this->render('index');//会将views/layouts/index.php 包含进common.php文件中
    }
    
    
    /**
     * 在视图中显示另外一个试图
     * @return type
     */
    public function actionView()
    {
         return $this->renderPartial('index');//会将views/layouts/index.php 包含进common.php文件中
    }
     
    
    
    public function actionBlock()
    {
         return $this->render('index');
    }
    /**
     * Url 组件
     * 路由显示
     * 分页组件
     */
    public function actionOther(){

//        $test = new \app\models\Test;
//
//        $test->validate();
//
//        echo \yii\helpers\Html::error($test , 'username' , ['class'=>'error']);//可以直接打印关联数据库的错误


        
//        echo Url::base();//输出根目录
//        echo '<br />';
//        echo Url::base(true);//加上域名的根目录
//
//        echo '<br />';
//        echo Url::home();//输出首页 , 加上 true 是输出加域名的首页
//        echo '<br />';
//        echo Url::home(true);

//                    echo '<br />';
//                    echo Url::current();//当前的 Url
//                    //to 和 toRoute 都是生成 Url , 后面加 true 都是生成带域名的 Url
//                    echo '<br />';
//                    echo Url::to(['index']);//当前控制器的indexurl      /Yii/yii2-demo/web/index.php?r=layouts%2Findex
//                    echo '<br />';
//                    echo Url::to(['site/index']); ///Yii/yii2-demo/web/index.php?r=site%2Findex
//                    echo '<br />';
//                    echo Url::to(['site/index'] , true);
//                    echo '<br />';
//                    echo Url::to(['site/index' , 'id' => 2 , 'type' => 3]);//    /Yii/yii2-demo/web/index.php?r=site%2Findex&id=2&type=3
//                     echo Url::to(['site/index' , 'id' => 2 , 'type' => 3],true); //   http://127.0.0.1/Yii/yii2-demo/web/index.php?r=site%2Findex&id=2&type=3
//                    echo '<br />';
//                    echo Url::toRoute(['index']);
//                    echo '<br />';
//                    echo Url::toRoute(['site/index']);
//                    echo '<br />';
//                    echo Url::toRoute(['site/index'] , true);
//                    echo '<br />';
//                    echo Url::toRoute(['site/index' , 'id' => 2 , 'type' => 3]); //  /Yii/yii2-demo/web/index.php?r=site%2Findex&id=2&type=3

//                  to 和 toRoute 之间的区别, 传入 string 时 , to 会直接把 string 当成 url 和 toRoute则会解析
//                    echo '<br />';
//                    echo Url::to('site/index');//site/index
//                    echo '<br />';
//                    echo Url::toRoute('site/index');///Yii/yii2-demo/web/index.php?r=site%2Findex
//  

                     //分 页 组 件 是 由 \yii\data\Pagination 提供 的 , 而 在 view 中 可 以 直 接 调 用\yii\widgets\LinkPager 直接生成分页的 Html.
                    //totalCount 是总数量
                    //pageSize 则是每页显示的个数
                    $pagination = new \yii\data\Pagination(['totalCount' => 100 , 'pageSize' => 5]);
                    //offset() , limit()
                   //$pagination -> offset , $pagination->limit
//                    echo $pagination -> offset; //print： 0   分页的偏移量
//                    echo '<br />';
//                    echo $pagination -> limit;//prin： 5  每页读取的个数
                    //生成分页 html 代码
                    echo \yii\widgets\LinkPager::widget([
                            'pagination' => $pagination,
                            'options' => [
                                    'id' => 'page'
                            ],
                            'nextPageLabel' => '下一页',
                            'lastPageLabel' => '最后一页'
                    ]);

            }
}