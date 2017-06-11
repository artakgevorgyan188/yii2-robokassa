<?php

use yii\helpers\Html;

$this->title = "E-SHOPPER | Последние новости";
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
        <div class="row">
            <div class="col-sm-12">
                <div class="blog-post-area">
                    <h2 class="title text-center">Последние новости</h2>
                    <div class="single-blog-post">
                        <h3>Добро пожаловать на сайт Eshopper.com</h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-calendar"></i><?=$news->datetime?></li>
                            </ul>
                        </div>
                        <?= Html::img("@web/images/home/logo.png", ['alt' => '']) ?>
                        <p>Мы объявляем об открытии продуктового интернет магазина в г. Краснодар</p>
                        <a class="btn btn-primary" href="<?= \yii\helpers\Url::to(["category/views"]) ///{$news->id}?>">Читать полностью</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br/>
<br/>