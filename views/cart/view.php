<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "E-SHOPPER | Корзина";
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'сумки описание',//$category->keywords if in db has field description
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'сумки ключевики',//$category->description if in db has field keywords
]);
?>
<div class="container">
    <?php if(Yii::$app->session->hasFlash('success')):?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success');?>
        </div>
    <?php endif;?>
    <?php if(Yii::$app->session->hasFlash('error')):?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error');?>
        </div>
    <?php endif;?>
    <?php if(!empty($_SESSION['cart'])){?>
        <div class="table-responsive" id="basket_table">
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
                <tbody id="cart_checkout">
                <?php foreach($_SESSION['cart'] as $id=>$item):?>
                    <tr class="cart_checkout<?php echo $id;?>">
                        <td><a href="<?=Url::to(['product/view','id' => $id])?>"><?=Html::img($item['cart_img'], ['alt' => $item['name']])//Html::img("@web/images/cart/{$item['cart_img']}"?></a></td>
                        <td><a class="basket_product_name" href="<?=Url::to(['product/view','id' => $id])?>"><?=$item['name']?></a></td>
                        <td><?=$item['qty']?></td>
                        <td class="cart_price-td">$<?=$item['price']?></td>
                        <td class="cart_total-td">
                            <p class="cart_total_price-td">$<?=$item['qty']*$item['price']?></p>
                        </td>
                        <td class="cart_del"><span data-id="<?=$id?>"  class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td><!--del-item  delete item ,but not page reload-->
                    </tr>
                <?php endforeach;?>
                <tr>
                    <td colspan="5"><strong>Итого: </strong></td>
                    <td><strong><?=$_SESSION['cart.qty']?></strong></td>
                </tr>
                <tr>
                    <td colspan="5"><strong>На сумму: </strong></td><!--for 5 fields-->
                    <td><strong><?=$_SESSION['cart.sum']?></strong></td>
                </tr>
                </tbody>
            </table>
        </div>
        <hr/>
        <ul>Доставка товара осуществляется:
            <ul>В будние дни (Понедельник - Пятница):
                <li>C 17:00</li>
            </ul>
            <ul>В субботу:
                <li>C 14:00</li>
            </ul>
            <p>В воскресенье доставка временно не осущетсвляется по техническим причинам.</p>
        </ul>
        <hr/>
    <div class="signup-form">
        <?php $form = ActiveForm::begin(); ?>
           <?=$form->field($order,'name')?>
           <?=$form->field($order,'email')?>
           <?=$form->field($order,'phone')?>
           <?=$form->field($order,'address')?>
           <?=Html::submitButton('Заказать',['class'=>'btn btn-success'])?>
        <?php ActiveForm::end(); ?>
        </div>
        <br/>
    <?php }else{?>
        <h3>Корзина пуста</h3>
        <a class="btn btn-default checkout" href="<?=\yii\helpers\Url::home()?>"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a>
        <br/><br/>
    <?php };?>


    <!--<section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="images/cart/one.png" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">Colorblock Scuba</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>$59</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">$59</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="images/cart/two.png" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">Colorblock Scuba</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>$59</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">$59</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="images/cart/three.png" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">Colorblock Scuba</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>$59</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">$59</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>$59</span></li>
                            <li>Eco Tax <span>$2</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>$61</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
</div>
