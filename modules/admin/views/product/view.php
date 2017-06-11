<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1>Просмотр продукта <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $imgFile = $model->getImage();;//or getimages() if more than one image?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'category_id',
                'value' => $model->category->name,
                'format' => 'html',//or raw, if not write attribute format will be work encode(htmlSpecialChars) and tag will not work correctly
            ],
            'name',
            'content:html',//default ntext raw,text,paragraphs,html,email,image,url,boolean   link - https://yiiframework.com.ua/ru/doc/guide/2/output-formatting/
            //ntext - значением будет экранированный от HTML текст с новыми строками, сконвертированными в разрывы строк.
            'price',
            'keywords',
            'description',
            /*[
                'attribute' => 'img',
                'value' => $model->img ? Html::img("@web/images/products/{$model->img}", ['alt' => $model->name]) : '',
                'format' => 'html',//or raw, if not write attribute format will be work encode(htmlSpecialChars) and tag will not work correctly
            ],*/
            [
                'attribute' => 'imageFile',
                'value' => "<img src='{$imgFile->getUrl()}'/>",
                'format' => 'html',
            ],
            [
                'attribute' => 'cart_img',
                'value' => $model->cart_img? Html::img("@web/images/cart/{$model->cart_img}", ['alt' => $model->name]) : '',
                'format' => 'html',
            ],
            [
                'attribute' => 'medium_img',
                'value' => $model->medium_img? Html::img("@web/images/product-details/{$model->medium_img}", ['width'=>'170px','alt' => $model->name]) : '',
                'format' => 'html',
            ],
            [
                'attribute' => 'recommend_img',
                'value' => $model->recommend_img? Html::img("@web/images/home/{$model->recommend_img}", ['alt' => $model->name]) : '',
                'format' => 'html',
            ],
            [
                'attribute' => 'hit',
                'value' => !$model->hit ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>',
                'format' => 'html',
            ],
            [
                'attribute' => 'new',
                'value' => !$model->new ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>',
                'format' => 'html',
            ],
            [
                'attribute' => 'sale',
                'value' => !$model->sale ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>',
                'format' => 'html',
            ],
            [
                'attribute' => 'stock',
                'value' => !$model->stock ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>',
                'format' => 'html',
            ],
            [
                'attribute' => 'rating',
                'value' => $model->rating? Html::img("@web/images/product-details/{$model->rating}", ['alt' => $model->name]) : '',
                'format' => 'html',
            ],
            [
                'attribute' => 'recommend',
                'value' => !$model->recommend ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>',
                'format' => 'html',
            ],
        ],
    ]) ?>

</div>
