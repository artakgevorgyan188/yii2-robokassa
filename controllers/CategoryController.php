<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use app\models\SearchForm;
use app\models\News;
use app\models\ContactUsForm;
use Yii;
use yii\data\Pagination;
use yii\helpers\Html;

class CategoryController extends AppController
{
    public function beforeAction($action)  //already has in Yii2 framework
    {
        $model = new SearchForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $q = Html::encode($model->q);//for htmlspecialchars
            return $this->redirect(Yii::$app->urlManager->createUrl(['category/search','q'=>$q]));//redirect - in yii framework already exists
        }
        return true;//it is require ,if form not send
    }
    public function actionIndex(){
        $hits = Product::find()->with('category')->where(['hit'=>'1'])->limit(6)->all();//hit - популярные, '1' because hit field is enum(0,1) 0 or 1
        //$this->setMeta('E-SHOPPER');
        $id = Yii::$app->request->get('id');
        //$product = Product::find()->with('category')->where(['id'=>$id])->limit(1)->one();
        $product = Product::findOne($id);
        $recommends = Product::find()->with('category')->where(['recommend'=>'1'])->limit(6)->all();
        //$this->setMeta('E-SHOPPER | ' .$product->name,$product->keywords,$product->description);
        return $this->render('index',[
            'hits'=>$hits,
            'recommends' => $recommends
        ]);//render - send to index.php
    }
    public function actionView($id){
        //or we can try this $id = Yii::$app->request->get('id') and don`t set $id in action
        $category = Category::findOne($id);
        if($category === null){//or if(empty($category), for client and for search system, and search system will remove it in her indexing
            throw new \yii\web\HttpException(404, 'Такой категории нет!.');
        }
        //$products = Product::find()->where(['category_id'=>$id])->all(); //if we write ->with('category') it will no good way if no one category has product and good way write $category
        $query = Product::find()->where(['category_id'=>$id]);
        $pages = new Pagination([
            'pageSize' => 3,//or defaultPageSize-?, default 20
            'totalCount' => $query->count(),
            'forcePageParam' => false,//in page 1 not write page 1 in url
            'pageSizeParam' => false//in url delete per-page
        ]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        //$this->setMeta('E-SHOPPER | ' .$category->name,$category->keywords,$category->description);//will go in db fields description
        return $this->render('view',[
            'products'=>$products,
            'category'=>$category,
            'pages'=>$pages
        ]);
    }
    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));//input name="q"
        if(!$q) return $this->render('search');
        $query = Product::find()->where(['like','name',$q]);
        $pages = new Pagination([
            'pageSize' => 3,//or defaultPageSize-?, default 20
            'totalCount' => $query->count(),
            'forcePageParam' => false,//in page 1 not write page 1 in url
            'pageSizeParam' => false//in url delete per-page
        ]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        //$this->setMeta('E-SHOPPER | ' .$category->name,$category->keywords,$category->description);//will go in db fields description
        return $this->render('search',[
            'products'=>$products,
            'pages'=>$pages,
            'q'=>$q
        ]);
    }
    public function actionDeliveryAndPayment(){
        return $this->render('delivery-and-payment');
    }
    public function actionReturnProduct(){
        return $this->render('return-product');
    }
    public function actionDiscount(){
        return $this->render('discount');
    }
    public function actionAbout(){
        return $this->render('about');
    }
    public function actionContactUs(){
        /* Для страницы контактов можно использовать свой слой
        $this->layout = 'contacts';*/


        $model = new ContactUsForm();

        if ($model->load(Yii::$app->request->post())) {
            if($model->contact(Yii::$app->params['adminEmail'])){
                //Yii::$app->session->setFlash('contactFormSubmitted');
                Yii::$app->session->setFlash('contactFormSubmitted', 'Благодарим Вас за обращение к нам. Мы ответим вам как можно скорее.');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('contactFormNotSubmitted','Ошибка при отправке сообщения!');
            }
        }
        return $this->render('contact-us',[
            'model' => $model,
        ]);
    }
    public function actionReviews(){
        return $this->render('reviews');
    }
    public function actionCareer(){
        return $this->render('career');
    }
    public function actionTermsOfUse(){
        return $this->render('terms-of-use');
    }
    public function actionNews(){
        $id = Yii::$app->request->get('id');
        $news = News::find()->orderBy(['datetime'=>SORT_DESC])->limit(1)->one();
        return $this->render('news',[
            'news'=>$news
        ]);
    }
    public function actionViews(){
        $id = Yii::$app->request->get('id');
        $news = News::find()->orderBy(['datetime'=>SORT_DESC])->limit(1)->one();
        return $this->render('views',[
            'news'=>$news
        ]);
    }
}