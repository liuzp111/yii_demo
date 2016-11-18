<?php

namespace app\controllers;
use yii\web\Controller;
use app\models\Article;
use yii\db\ActiveRecord;
use app\models\Customer;
use app\models\Order;
/**
 * 数据库查询学习
 */
class DbController extends Controller
{
    public function  actionIndex()
    {
//        1、ActiveRecord 类型的增删改查
//           以\app\models\Article 模型为准 ， 来操作以下函数
        
        //===========================查询===============================
        //原生查询
//        $sql = 'select * from mrs_article where id=1';
//        $result = Article::findBySql($sql)->all();
//        var_dump($result);
//        （1）占位符：（：id），加载Sql语句后面<br>
//        （2）在findBySql（$sql,array()）数组中赋值。由于array（）会把用户传递过来的值作为一个整体去处理，<br>
//        （3）findBySql防止SQL注入
//         $sql = 'select * from mrs_article where id=:id';
//        $result=Article::findBySql($sql,array(':id'=>2))->asArray()->all();
//        var_dump($result);
//        $sql='select * from mrs_article where id=:id ';
//        $result=Article::find($sql)->where(['id'=>2])->asArray()->all();//findBySql第二个参数设置占位符   
//        var_dump($result);     
//        
        //查询id>0
//            $results = Article::find()->where(['>','id',0])->all();
//            print_r($results);
            //查询id>=1 and id<=2
            //$results = Article::find()->where(['between','id',1,2])->all();
            //echo count($results);
            //查询title like '%title%'
//            $results=Article::find()->where(['like','title','45'])->all();
//            print_r($results);
            //将查询结果转换成数组
//        $results=Article::find()->where(['like','title','45'])->asArray()->all();
//        print_r($results);
        //批量查询
        //通过Model::find()->batch(10),可以每次循环取10条，功能类似于文件读取中的管道读取，
        //一次只加载部分到内存，这样可以节省内存，避免浪费（一次载入所有到内存然后慢慢处理，是会占用较多内存的）
//        foreach (Article::find()->batch(2) as $value) {
//            print_r($value);echo count($value);
//        }
//        print_r($results);
//        $articles = Article::findAll(['status' => '1']);
//        var_dump($articles);
//        $article = Article::findOne(1);//根据主键查询
        
//        $article = Article::findOne(['status' => '1']);
        //find的数据库总条数
        //echo Article::find()->count();
//        $article = Article::find()->where(['id' => 2])->one();
//        $article = Article::find()->where('id=2')->one();
//        $article = Article::find()->where('id=:id' , [':id' => 2])->one();    //防止注入
//        var_dump($article);
        
//        $article = Article::find()->where(['status' => '1'])->all();

//        $article = Article::find()->where(['status' => '1'])->orderBy('date DESC')->one();
//        $article = Article::find()->where(['status' => '1'])->offset(1)->limit(1)->all();        
//         var_dump($article);
          //===========================更新===============================
          ////save 函数第一个参数默认为 true , 就是更新或插入启动验证
            //如果不想使用验证可以用 save(false);
//        $article = Article::findOne(1);
//        $article -> title = 'This is a new title';
//        var_dump($article -> save(false));    //    
//          var_dump(Article::updateAll(['title' => '2222Update'] , ['id' => 1]));      
//       //==========================添加======================================
        //数据模型之单表添加数据
        //增加数据
        $test = new \app\models\Test;//实例化Article模型并保存在$test变量中
        //id和title字段可以预先在保存之前通过属性的方式赋值
        $test->id = '3';
        $test->title = 'title3';
        $test->content = 'tititle3title3tle3';
        
        //在保存数据的时候，这些数据是用户发送的请求当中获取的，保存前需要进行数据的合法性验证，Article模型里有专门的函数验证。
        $test->validate();//保存数据之前调用validate()方法启用验证器rules()去判断id和title符不符合保存的条件
       
        if ($test->hasErrors()) {
            echo 'data is error!';//如果发生校验错误，说明数据不合法。 
            die;//结束掉程序，不让它保存
        }
        $test->save();//调用save()方法把它转化为一条数据并保存在表单中         
        //添加一条新数据。不指定更新条件，既是添加一条新数据
//        $article = new Article();
//        $article -> title = 'new new new';
//        $article -> description = 'new description , new description';
//        $article -> content = 'new content new content new content ..';
//
//        var_dump($article -> save(false));        
        //数据模型之单表删除
         //删除数据，先取出要删除的数据
         /*$results = Article::find()->where(['id'=>1])->all();
         $results[0]->delete();//调用delete()方法就可以删除第一条数据*/
         //删除数据有个更快捷的方式：调用控制器当中的deleteAll()方法把整个表里的数据删掉;同时这个方法里也可以带上查询条件指定删除哪部分的数据。
         //Article::deleteAll('id>0');
//         Article::deleteAll('id>:id',array(':id'=>0));//deleteAll也支持占位符的功能
//        var_dump(Article::findOne(4)->delete());
//        print_r(Article::findOne(4));        
//        var_dump(Article::deleteAll(['id' => 3]));
        //==================================================================
        //2、\yii\db\Query 查询数据        
//	$db = (new \yii\db\Query);
        //指定查询字段
//        $article = $db->select('id')->from('mrs_article')->where('id=:id' , [':id' => 1])->one();
        //绑定单个防注入参数
//        $article = $db->select('id')->from('mrs_article')->where('status=:status' , [':status' => '1'])->all();
        //in 查询多条
//             $article = $db->select('id')->from('mrs_article')->where(['id' =>[1,2]])->all();        
//        $article = $db->select('id')->from('mrs_article')->where('status=:status' , [':status' => '1'])->orderBy('id DESC')->all();
    //        $article = $db->select('id')->from('mrs_article')->where('status=:status' , [':status' => '1'])->orderBy('id DESC')->offset(1) -> limit(1) ->all();
//        print_r($article);     
        //查询数据总个数
//        echo $db->select('id')->from('mrs_article')->count();
//           
//       //===================================================     
//       // 3、Yii::$app->db 进行增删改查         
        
//	$db = \Yii::$app->db;

//        $article = $db -> createCommand("SELECT * FROM ".$db->tablePrefix."article")->queryAll();
//        $article = $db -> createCommand("SELECT * FROM ".$db->tablePrefix."article")->queryOne();
        //绑定单个防注入参数
//        $article = $db -> createCommand("SELECT * FROM ".$db->tablePrefix."article WHERE id=:id")->bindValue(':id' , '2')->queryOne();
        ///绑定多个防注入参数
//        $article = $db -> createCommand("SELECT * FROM ".$db->tablePrefix."article WHERE id=:id AND status=:status")->bindValues([':id'=>'2' , 'status' => '1'])->queryOne();
        //查询数量
//        $article = $db -> createCommand("SELECT COUNT(*) FROM ".$db->tablePrefix."article")->queryScalar();
        //$article['count']


//        $a = $db->createCommand()->insert($db->tablePrefix."article" , ['content'=>'啦啦啦啦啦', 'title' => 'aaaa' , 'description'=>'bbbb'])->execute();

//        var_dump($db->createCommand()->update($db->tablePrefix."article" , ['title' => '45454'] , 'id=:id' , [':id' => 2])->execute());

//        var_dump($db->createCommand()->delete($db->tablePrefix."article" , 'id=:id' , [':id' => 5])->execute());		
//        print_r($article);     
        //print_r($a);
        
    }
    
    
    /**
     * 关联查询
     * 多表查询
     */
    public function actionJoin()
    {
        $customer = Customer::find()->where(['name'=>'张三'])->one();
        //在Customer活动记录当中并没定义orders属性，
        //按理说使用orders会返回一个空值，
        //怎么会返回$orders订单数据呢？
        //原因是当访问$customer对象(Customer活动记录的实例)里不存在的属性时，
        //PHP会去调用__get()函数;
        //__get()函数在活动记录里会去自动调用一个(get+属性名字)的方法，也就是getOrders()，
        //调用完之后__get()函数会在后面自动补上一个all()方法。
        //把通过all()方法抓取的数据返回给$orders变量。
        //这个自动补上的all()方法会与Customer.php里getOrders()函数的all()[删掉这个all()]方法冲突。
        $orders = $customer->orders;//优化：Yii框架允许通过属性的方式直接获取订单数据。
        print_r($orders);        
        
        //根据订单查询顾客的信息
        $order =Order::find()->where(['order_id'=>1])->one();
        $customer = $order->customer; //以属性的方式获取数据
        print_r($customer);
        //注：若使用以属性的方式获取数据，则在模型里面要定义一个方法，该方法要以get+属性的命名方式。        
    }
    
    /**
     * 关联查询涉及到的性能问题
     * 1、查询结果缓存（假设结果被更新，则需要清除关联查询结果缓存）
     * 2、需要查询多条数据时候，用with
     */
    public function actionManyJoin(){
        $customer = Customer::find()->where(['name'=>'zhangsan'])->one();
        $orders = $customer->orders; //select * from order where customer_id = ...        
        //假设结果被更新，则需要清除关联查询结果缓存
        unset($customer->orders);
        //关联查询的时候涉及到性能问题。
        //==============================
        //使用foreach会造成查询很多次数据库。假设customer有100条数据，则foreach会执行100次
        $customers=Customer::find()->all();//执行的sql语句为：select * from Customer;
        foreach($customers as $customer){
             $orders=$customer->orders;
        }      
        //=================================
       
        //============改进，使用with========
        $custome=Customer::find()->with('orders')->all();
        //执行的sql语句为：select * from Customer;select * from Order where customer_id in(...);
        //加上with（'order'）这时候遍历的时候就不需要再执行sql语句

    }
}