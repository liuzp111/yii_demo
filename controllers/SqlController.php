<?php
namespace app\controllers;
use yii\web\Controller;

class SqlController extends Controller{

	/**
	 * 通过PDO操作数据库的方式来防止sql注入
	 * 如果在数据库配置中'emulatePrepare'=>false，则占位符转义是在数据库端，目的是由数据库对字符串进行转义操作，阻止sql注入
	 * 运行下面代码，sql语句会分成两部分:
	 * 向MySQL传递第一份数据：select * from users where name=?
	 * 向MySQL传递第二份数据：zhangsan，会在MySQL进行转义，就算传过来的是中文和单引号，也会把单引号转义之后再执行sql语句，就防止了sql注入
	 */
	public function actionTest(){
		$user = (new \yii\db\Query())
			->select('*')
			->from('mrs_customer')
			->where('name=:name',[':name'=>'张三'])
			->one();

		print_r($user);
	}
}