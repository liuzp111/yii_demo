<?php

namespace app\models;
use Yii;
use yii\base\Model;
use \yii\db\ActiveRecord;
class EntryForm extends Model
{
    public  $name ;
    public  $email;
    public function rules() 
    {
        parent::rules();
         return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}
