<?php

namespace app\controllers;
use yii\web\Controller;
use app\models\Country;

class CountryController extends Controller
{
    public function  actionIndex()
    {
        $query = Country::find();
        $pagination = new \yii\data\Pagination(
                [
                    'defaultPageSize'=>5,
                    'totalCount'=>$query->count(),
                ]
        );
        $countries = $query -> orderBy('name')
                            ->offset($pagination->offset)
                            ->limit($pagination->limit)
                            ->all();
        return $this->render('index',['countries'=>$countries,'pagination'=>$pagination]);
        
    }
}












