<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php if(!empty($_SESSION['cart'])){?>
<div class="table-responsive">
        <table class="table table-hover table-striped"><!--table hover for hover color vor items,table-striped for avery another item-->
            <thead>
                <tr class="cart_menu_tr">
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th class="total">Сумма</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION['cart'] as $id=>$item):?>
                <tr>
                    <td><a href="<?=Url::to(['product/view','id' => $id])?>"><?=Html::img($item['cart_img'], ['alt' => $item['name']])//?></a></td>
                    <td><a class="cart_product_name" href="<?=Url::to(['product/view','id' => $id])?>"><?=$item['name']?></a></td>
                    <td><?=$item['qty']?></td>
                    <td class="cart_price-td">$<?=$item['price']?></td>
                    <td class="cart_total-td">
                        <p class="cart_total_price-td">$<?=$item['qty']*$item['price']?></p>
                    </td>
                    <td class="cart_del"><span data-id="<?=$id?>" data-count="<?=$item['qty']?>"  class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td><!--del-item  delete item ,but not page reload-->
                </tr>
           <?php endforeach;?>
                <tr>
                    <td colspan="5"><strong>Итого: </strong></td>
                    <td><strong><?=$_SESSION['cart.qty']?></strong></td>
                </tr>
            <tr>
                <td colspan="5"><strong>На сумму: </strong></td><!--for 5 fields-->
                <td class="count_pr"><strong><?=$_SESSION['cart.sum']?></strong></td>
            </tr>
            </tbody>
        </table>
    </div>
<?php }else{?>
    <h3>Корзина пуста</h3>
    <?php };?>

