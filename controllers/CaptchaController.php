<?php
namespace app\controllers;

use yii\web\Controller;

use Yii;
/**
 * 验证码学习
 */
class CaptchaController extends Controller{
        
	public function actions(){
		return [
			'captcha' => [
                                 //验证码类
				'class' => 'yii\captcha\CaptchaAction' ,
				'maxLength' => 4,
				'minLength' => 4,
				'width' => 80,
				'height' => 40
			],
		];
	}
        /**
         * 第一种生成验证码的方式，使用model
         * @return type
         */
	public function actionVcode(){

		$model = new \app\models\Captcha();

		if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())){
			if($model -> validate()){
				echo '验证成功';
			}else{
				var_dump($model->getErrors());
			}
		}

		return $this->render('vcode' , ['model' => $model]);

	}

        /**
         * 第二种使用验证码的方式
         * 自定义的验证码和验证
         * 自己不想去调用 Model 啥的 ,
         * 可以自己进行自定义，不过验证的时候代码就有点麻烦。
         * @return type
         */
	public function actionVcodeTwo(){

		if(Yii::$app->request->isPost){
			$code = Yii::$app->request->post('vcode');
                        //这里变了
                        //实例化一个验证码验证对象
			$cpValidate = new \yii\captcha\CaptchaValidator();
			$cpValidate->captchaAction = 'captcha/captcha'; //配置 action 为当前的
                       
			$cpAction = $cpValidate->createCaptchaAction();//创建一个验证码对象
			$scode = $cpAction -> getVerifyCode();//读取验证码
			if($code == $scode){
				echo '验证成功';
			}else{
				echo $code , ' != ' , $scode;
			}
		}

		return $this->render('vcodetwo' , []);
	}





}


