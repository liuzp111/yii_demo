<?php

namespace app\models;

use yii\db\ActiveRecord;
//关联表article
class Article extends ActiveRecord {

    public static function tableName() {
        return '{{%article}}';
    }

}
