<?php

namespace app\models;

use yii\base\Model;

//不关联表
class Test extends Model
{
	public $username;
	public $password;
	public $repassword;
	public $age;
	public $number;
	public $email;
	public $sex;
	public $pt;
	public $str;
        public $id;
        public $title;
        public $content;
        public function rules(){
		return [
			//['username' , 'required' , 'message' => '用户名不能为空'],
			//['password' , 'required' , 'message' => '密码不能为空'],
			[['password' , 'username'] , 'required' , 'message' => '测试不能为空'],
			//['password' , 'compare' , 'compareValue' => '123456' , 'message' => '不等于123456']
			['password' , 'compare' , 'compareAttribute' => 'repassword' , 'message' => '两次密码不一致'],
			['repassword' , 'safe'],
			['age' , 'double' , 'min' => 1.2 , 'max' => 10.3 , 'tooSmall' => '小于1.2' , 'tooBig' => '大于10.3' , 'message' => '不是数字'],
			['number' , 'integer' , 'min' => 2 , 'max' => 9 , 'tooSmall' => '小于2' , 'tooBig' => '大于9' , 'message' => '不是整数'],
			['email' , 'email' , 'message' => '邮箱的格式错误'],
			['sex' , 'in' , 'range' => ['nan' , 'nv'] , 'message' => '不在选择范围内'],
			['pt' , 'match' , 'pattern' => '/^mrs\d{2,}$/' , 'message' => '不符合mrs加2个数字开头'],
			['str' , 'string' , 'min' => 2 , 'max' => 10 , 'tooShort' => '不能小于2位' , 'tooLong' => '不能大于10位'],
			//[['username' , 'password'] , 'safe'],
			['username' , 'checkUsername' , 'params' => ['message' => '不是等于smister']],
                        ['id','integer'],//Yii提供了一个验证器(每个验证器都是一个类)的东西，比如integer验证器。
                        ['title','string','length'=>[0,5]],
                        ['content','string','length'=>[0,5]],
		];
	}

	public function checkUsername($attribute , $params){
		//print_r($params);
		//echo $this->$attribute , '<br />';
		if($this->$attribute != 'smister'){
			$this->addError($attribute , $params['message']);
		}
	}        
}
