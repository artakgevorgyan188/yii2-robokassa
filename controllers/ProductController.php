<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;

class ProductController extends AppController
{
    public function actionView($id){
       //$id = Yii::$app->request->get('id');
        //$product = Product::find()->with('category')->where(['id'=>$id])->limit(1)->one();
        $product = Product::findOne($id);
        if($product === null){//or if(empty($category), for client and for search system, and search system will remove it in her indexing
            throw new \yii\web\HttpException(404, 'Такова товара нет!.');
        }
        $recommends = Product::find()->with('category')->where(['recommend'=>'1'])->limit(6)->all();
        //$this->setMeta('E-SHOPPER | ' .$product->name,$product->keywords,$product->description);
        return $this->render('view',[
            'product' => $product,
            'recommends' => $recommends
        ]);
    }
}