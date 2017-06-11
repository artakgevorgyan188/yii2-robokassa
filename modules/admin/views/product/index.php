<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'category_id',
                'value' => function($data){//callBack function for $data from class Category getCategory()
                    return $data->category->name;
                },
                'format' => 'html',//or raw, if not write attribute format will be work encode(htmlSpecialChars) and tag will not work correctly
            ],
            'name',
            //'content:ntext',
            'price',
            // 'keywords',
            // 'description',
            // 'img',
            // 'cart_img',
            // 'medium_img',
            // 'recommend_img',
            [
                'attribute' => 'hit',
                'value' => function($data){//callBack function for $data from class Category getCategory()
                    return !$data->hit ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
                },
                'format' => 'html',//or raw, if not write attribute format will be work encode(htmlSpecialChars) and tag will not work correctly
            ],
            [
                'attribute' => 'new',
                'value' => function($data){//callBack function for $data from class Category getCategory()
                    return !$data->new ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
                },
                'format' => 'html',//or raw, if not write attribute format will be work encode(htmlSpecialChars) and tag will not work correctly
            ],
            [
                'attribute' => 'sale',
                'value' => function($data){//callBack function for $data from class Category getCategory()
                    return !$data->sale ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
                },
                'format' => 'html',//or raw, if not write attribute format will be work encode(htmlSpecialChars) and tag will not work correctly
            ],
            // 'stock',
            // 'rating',
            // 'recommend',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
