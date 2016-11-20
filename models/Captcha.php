<?php


namespace app\models;

use yii\base\Model;

class Captcha extends Model{
	public $vcode;

	public function rules(){
		return [
			['vcode' , 'captcha' , 'captchaAction' => 'captcha/captcha' , 'message' => '验证码不正确'],
		];
	}

}
