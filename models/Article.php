<?php

namespace app\models;

use yii\db\ActiveRecord;
//关联表article
class Article extends ActiveRecord {

    public static function tableName() {
        return '{{%article}}';
    }
    public function rules(){
            return [
                    ['title' , 'required' , 'message' => '标题不能为空'],
                    ['title' , 'string' , 'min' => 2 , 'max' => 200 , 'tooShort' => '标题不能少于2位' , 'tooLong' => '标题不能大于200位'],
                    ['content' , 'required' , 'message' => '内容不为空'],
                    ['description' , 'string' , 'max' => 500 , 'tooLong' => '描述不能大于500位'],
                    ['flag','required','message'=>'请标示文章'],
                    ['flag' , 'integer' , 'min' => 0 , 'max' => 9 , 'tooSmall' => '非法操作' , 'tooBig' => '非法操作' , 'message' => '非法操作'],
                    ['count'  , 'integer' , 'min' => 0 , 'tooSmall' => '必须是大于等于0的整数' , 'message' => '请输入一个整数'],
                    ['status' , 'in' , 'range' => ['0' , '1'] , 'message' => '非法操作']
            ];
    }

}
