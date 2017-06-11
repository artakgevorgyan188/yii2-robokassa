<?php

use yii\helpers\Html;

$this->title = "E-SHOPPER | О нас";
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'сумки описание',//$category->keywords if in db has field description
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'сумки ключевики',//$category->description if in db has field keywords
]);
?>

<section>
    <div class="container">
        <div class="row row-content">
            <div class="col-sm-12">
                <h2 class="title text-center">О нас</h2><p><strong><span style="color: #008000;"><em><span style="font-family: 'times new roman', times; font-size: 24pt;"><?= Html::img("@web/images/about/pochemu_my.png", ['title' => 'почему мы','class'=>'img-responsive','style'=>['margin'=>'0 auto']]) ?></span></em></span></strong></p>
                <p><strong><span style="color: #008000;"><em><span style="font-family: 'times new roman', times; font-size: 24pt;">Мы рады приветствовать вас в нашем интернет магазине! &nbsp;</span></em></span></strong></p>
                <p><span><span style="color: #008000;"><strong>«FamilyМag»</strong></span> - это новый инновационный формат для продажи продуктов питания в Перми.</span></p>
                <p><span>Интернет магазин&nbsp;"FamilyMag"&nbsp;создан для тех кто:</span></p>
                <p><span>&nbsp; &nbsp; -</span><span style="font-family: 'times new roman', times;">ценит свое время;</span></span></p>
                <p><span>&nbsp; &nbsp; -нуждается в прямой доставке продуктов до дома, работы или офиса;</span></p>
                <p><span>&nbsp; &nbsp; -не доволен уровнем сервиса в магазинах ;</span></p>
                <p><span>&nbsp; &nbsp; - устал общаться с неквалифицированным персоналом магазинов.</span></p>
                <p><span style="font-family: 'times new roman', times; font-size: 18pt;">&nbsp;</span></p>
                <p style="text-align: left;"><span style="font-family: 'times new roman', times; font-size: 18pt;"><strong><span style="color: #008000;"><em>&nbsp; &nbsp; &nbsp; <span style="font-size: 24pt;">&nbsp; &nbsp; &nbsp;Почему Вы должны покупать у нас?</span></em></span></strong></span></p>
                <p><span style="font-family: 'times new roman', times; font-size: 18pt;">&nbsp; &nbsp; <span style="font-size: 14pt;">&nbsp; &nbsp; В нашем интернет магазине представлен широкий ассортимент различных высококачественных продуктов.</span></span></p>
                <p><span>&nbsp; &nbsp; &nbsp; &nbsp; У нас имеются прямые контракты со многими производителями продуктов питания, поэтому наши клиенты приобретают качественные товары на выгодных условиях.</span></p>
                <p><span>&nbsp; &nbsp; &nbsp; &nbsp; Нашим постоянным покупателям мы предлагаем индивидуальные условия по доставке товара, оплате и системе скидок.&nbsp;</span></p>
                <p><span>&nbsp; &nbsp; &nbsp; &nbsp; Заказывая у нас, каждый наш покупатель получает:</span></p>
                <p><span>&nbsp; &nbsp; &nbsp; &nbsp; - доступные цены;</span></p>
                <p><span>&nbsp; &nbsp; &nbsp; &nbsp; -гарантию качества продукта;</span></p>
                <p><span>&nbsp; &nbsp; &nbsp; &nbsp; -своевременную доставку заказа до дома или офиса.</span><span style="font-size: 14pt;"> <br></span></p>
            </div>
        </div>
    </div>
</section>
<br/>
<br/>