<?php


namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
//关联表
class Order extends ActiveRecord 
{
    /**
     * 关联查询：
        hasMany:一对多，hasOne：一对一
        $customer->orders; $customer当没有orders属性时，
     * $customer自动调用_get()方法，拼接调用getOrders()方法，
     * 并自动在后面加上all()方法或者one()方法，
     * 至于何时自动拼接all或者one,取决于关联查询是用的hasMany还是hasOne,如果是hasMany则拼接all,否则反之。
     * @return type
     */    
    public function getCustomer(){
        //hasOne 和hasMany方法，传递的关联字段是有顺序的，比如下方的，id对应customer表，customer_id 对应$this 也就是order 表
        $orders = $this->hasOne(Customer::className(),['id'=>'customer_id'])->asArray();//$this代表当前实例化出来的顾客
        return $orders;//获取了订单数据之后再返回出去
    }      
    
}
