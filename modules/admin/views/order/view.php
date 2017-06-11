<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = "Просмотр заказа №".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            [
                'attribute' => 'status',
                'value' =>!$model->status ? '<span class="text-danger">Активен</span>' : '<span class="text-success">Завершен</span>',
                'format' => 'html',//or raw, if not write attribute format will be work encode(htmlSpecialChars) and tag will not work correctly
            ],
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>

    <?php $items = $model->orderItems; ?>
    <div class="table-responsive" id="basket_table" >
        <table class="table table-hover table-striped" ><!--table hover for hover color vor items,table-striped for avery another item-->
            <thead>
            <tr class="cart_menu_tr">
                <th>Фото</th>
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th class="total">Сумма</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($items as $item):?>
                <tr>
                    <td><a href="<?=Url::to(['/product/view','id' => $item->product_id])?>"><?=Html::img("@web/images/cart/{$item->product->cart_img}", ['alt' => $item->name])?></a></td>
                    <td><a class="basket_product_name" href="<?=Url::to(['/product/view','id' => $item->product_id])?>"><?=$item['name']?></a></td>
                    <td><?=$item['qty_item']?></td>
                    <td class="cart_price-td">$<?=$item['price']?></td>
                    <td class="cart_total-td">
                        <p class="cart_total_price-td">$<?=$item['sum_item']?></p>
                    </td>
                </tr>
            <?php endforeach;?>
            <tr>
                <td colspan="4"><strong>Итого: </strong></td>
                <td><strong><?=$model->qty?></strong></td>
            </tr>
            <tr>
                <td colspan="4"><strong>На сумму: </strong></td><!--for 5 fields-->
                <td><strong><?=$model->sum?></strong></td>
            </tr>
            </tbody>
        </table>
    </div>

</div>
