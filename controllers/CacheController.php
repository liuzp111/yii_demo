<?php
namespace app\controllers;

use Yii;

use yii\web\Controller;

/**
 * yii 缓存学习
 */
class CacheController extends Controller
{
    /**
     * 文件缓存
     */
    public function  actionFile(){
        //数据缓存之增删改查(数据缓存：PHP中的某些变量和数据库中的数据，缓存数据需要把数据缓存到介质当中，
        //比如说缓存到硬盘当中，叫做文件缓存；memcached内存技术；把数据缓存到数据库当中...)
        //要使用数据缓存需要指定把数据缓存到何处->需要对Yii框架进行配置(basic/config/web.php),
        //在components组件里的cache组件里，Yii默认指定了使用FileCache文件缓存的方式。		
        //获取缓存组件
        $cache = \Yii::$app->cache;
        //1.往缓存当中写数据，通过add('keyname','value')方法：
        //在存储数据时，先看有没有对应的数据，如果有，则不会把这个数据再存到缓存当中。
        //add()方法特别注意：如果add了2个key1。在它内部会判断第1个key1有没有值或者存不存在，如果存在或有值的话，后面的add就会失效，无法写值。这里只会打印出第1个key1的值。
        //$cache->add('key1','hello cache!');
        $cache->add('key1','hello cache1!');
        //$cache->add('key2','hello cache2!');
        $cache->add('key1','hello cache2!');
        //3.修改缓存数据，通过set('keyname','changedvalue')方法
        //$cache->set('key1','hello new cache!');
        //4.删除缓存数据，通过delete('keyname')方法；删除完之后，$data应该是空值，或者说get获取不到数据，就会返回一个false。通过var_dump打印数据类型。
        //$cache->delete('key1');
        //5.如果一开始写入很多缓存数据，要清空所有缓存数据，通过flush()函数。
        //$cache->flush();//此时获取key1和key2都是失败的			
        //读取缓存数据，通过get('keyname')方法读取。再放进变量当中
//        $data = $cache->get('key1');
//        var_dump($data);//4.删除后打印数据的类型是否为false
        //print_r($data);
        
        //=====缓存有效期
        //缓存数据有效期设置：数据加到缓存当中在一定时间内生效，过期自动释放掉。
        $cache = \Yii::$app->cache;
//        $cache->add('key','hello cache!',15);//1.用add('keyname','value',s秒)方法的第3个参数。缓存只保存15秒
        //$cache->set('key','hello cache!',15);//2.也可以用set()方法
        echo $cache->get('key');        
        
        
    }
    /**
     * 数据换成的依赖关系
     * 1、文件依赖
     * 2、表达式依赖
     * 3、DB依赖(DbDependency)
     * 缓存依赖  不管哪种依赖 只要改变了里面的东西  那么缓存就没了
     */
    public function actionDependency(){
//        缓存中的依赖关系：
       $cache = \Yii::$app->cache;
//        1、文件依赖(FileDependency)：一旦文件改变，缓存将失效
//        $dependency = new \yii\caching\FileDependency(['fileName'=>'test.txt']);
//        $cache->add('file_key','hello word!',3000,$dependency);
//         echo $cache->get('file_key');  
//        2、表达式依赖(ExpressionDependency)：一旦表达式改变，缓存将失效
           //下方写错了，get后面携带的是[  ] 
//        $expression_dependency = new \yii\caching\ExpressionDependency(['expression'=>'\Yii::$app->request->get["test"]']);
        //正确写法
//        $expression_dependency = new \yii\caching\ExpressionDependency(['expression'=>'\Yii::$app->request->get("test")']);
        //$cache->delete('expression_key');
//        $cache->add('expression_key1','hello world',3000,$expression_dependency); 
        //访问：http://127.0.0.1/Yii/yii2-demo/web/index.php?r=cache/dependency&test=3434
//         var_dump( $cache->get('expression_key1'));        
//        $dependency = new \yii\caching\ExpressionDependency(['expression'=>'\Yii::$app->request->get("id")']);
//        $cache->add('file_key','hello world',3000,$dependency);
//        var_dump( $cache->get('file_key'));
//        3、DB依赖(DbDependency)：一旦数据改变，缓存将失效
        $dependency=new \yii\caching\DbDependency(['sql'=>'select count(*) from mrs_order']);        
//        $cache->delete('file_key');
        $cache->add('file_key','hello world',3000,$dependency);
        var_dump($cache->get('file_key')); // hello world
    }
    
    /**
     * 片段缓存
     * 片段缓存的使用
     * 片段缓存介绍(主要负责把前端界面的一些区域[不会经常变动的区域：如京东商品分类]缓存起来[缓存到内存或文件中]，
     * 下次访问时直接从缓存里把数据拿出来，而不用再从数据库抓取信息，提高了程序的执行效率)
     */
    public function actionFragment(){
        return $this->renderPartial('fragment');//显示cache视图(views\cache\fragment.php)
    }
    /**
     * 片段缓存设置
     * 缓存依赖、设置缓存时间、是否开启缓存
     *访问： http://127.0.0.1/Yii/yii2-demo/web/index.php?r=cache/fragment-setting
     */
    public function actionFragmentSetting()
    {
        return $this->renderPartial('fragment_setting');//显示cache视图(views\cache\fragment_setting.php)
    }
    /**
     * 嵌套缓存片段
     * 嵌套缓存的时候要注意，外层缓存时间要不能大于内层的缓存时间，
     * 因为读取有顺序，当读取到外层缓存没有过期的时候就不会继续往下读取了。
     * 谨慎使用：外层的失效时间应该小于内层，外层的依赖条件应该低于内层，以确保最小的片段，返回的是最新的数据。
     * http://127.0.0.1/Yii/yii2-demo/web/index.php?r=cache/nesting-cache
     */
    public function actionNestingCache(){
         return $this->renderPartial('nesting_cache');//显示cache视图(views\cache\nesting_cache.php)
    }
    /**
     * 页面缓存
     * 在控制器内加入behaviors方法，该方法将在此控制器内所有Action之前运行
     */
    public function actionPageCache(){
       // echo '5';
        return $this->renderPartial('page_cache');//缓存这个视图        
    }
    /**
     * 1.有个请求去访问此控制器的方法之前，框架会先去执行behaviors方法，然后再去执行相应的方法操作。
     * 2.那么就可以使用在这个behaviors方法里返回的值(返回一个数组，
     *   在数组里进行一些配置项)去先告诉Yii框架待会有请求去访问控制器的方法时，
     *   可以把这个操作的结果缓存到一个页面缓存当中。    
     * @return type
     */
    public function behaviors(){
       
        echo 'behaviors()先执行'.'<br/>';
        //PageCache
       /*return [
                [
                    'class'=>'yii\filters\PageCache',//页面缓存类
                    'duration'=>1000,	//有效期
                    'only'=>['index','page-cache'],//指定控制器哪些操作会页面缓存
                    'dependency'=>[	//页面依赖
                            'class'=>'yii\caching\FileDependency',
                            'fileName'=>'hw.txt'
                    ]
                ]
            ];*/
        //HttpCache 实例1
//         return [
//                    [
//                        'class' => 'yii\filters\HttpCache',
//                        'lastModified' => function() {
//                        //return 1432817565;//返回一串整数(时间戳)
//                        return 143281756; //修改了时间信息，httpcache里修改的内容才会被显示出来。
//                    },
//                        'etagSeed' => function() {
//                        return 'etagsee2'; //返回字符串
//                    }
//                ]
//        ];
//    }
        //HttpCache 实例2
        return [
                [
                    'class'=>'yii\filters\HttpCache',
                    'lastModified'=>function(){//比较浏览器的数据和服务器的数据修改日期是否一样

                            return filemtime('httpCache.txt');//取最后一次修改时间，返回一个时间戳
                    },
                    'etagSeed'=>function(){//判断浏览器的数据和服务器的数据内容是否一样
                            //当txt文件的内容标题改变的时候，才会返回200 ，否则304 not modified
                            $fp = fopen('httpCache.txt','r');
                            $title = fgets($fp);//取第一行数据
                            fclose($fp);
                            return $title;//和返回数据内容相关的字符串
                    }
                ]
        ];
    }
    /**
     * http缓存
     * 在浏览器端，通过请求头信息 last-modified(修改时间), etag来判断是文件是否发生变化，
     * 若无无变化，则使用状态码 304，通知浏览器使用缓存
     * ETag和last-modify作为Http的标准header，会令浏览器返回304 Not Modified
     * httpCache的依赖:
        lastModified: 时间标识
        etagSeed：内容标识
        当二者同时存时，需要两个均发生变化才会发送200并返回新数据
     * //================================================
     * 当启用了httpCache后，响应体中会有Cache-Control  、Etag、 Last-Modified这些服务器响应的参数告诉浏览器缓存信息
     * Cache-Control:public, max-age=3600
        Connection:Keep-Alive
        Content-Length:78
        Content-Type:text/html; charset=UTF-8
        Date:Sat, 19 Nov 2016 15:43:36 GMT
        Etag:"E7Jwz/7asV4q9Hls8SgcYQnj+ps"
        Keep-Alive:timeout=5, max=100
        Last-Modified:Wed, 17 Jul 1974 08:29:16 GMT
        Pragma:
        Server:Apache/2.4.23 (Win64) PHP/7.0.10
        X-Powered-By:PHP/7.0.10
     */
    public function actionHttpCache(){
         return $this->renderPartial('http_cache');//缓存这个视图       
    }
    
    /**
     * httpCache的小实例
     * @return type
     */
    public function actionHttpCachetwo(){
        $content = file_get_contents('httpCache.txt');//把文件全部数据读出来
        return $this->renderPartial('http_cachetwo',['new'=>$content]);
    }
    
}