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
            <div class="blog-post-area">
                <div class="single-blog-post">
                    <h3>Новость №<?=$news->id?></h3>
                    <h2 class="title text-center">Добро пожаловать на сайт Eshopoer.com</h2>
                    <div class="post-meta">
                        <ul>
                            <li><i class="fa fa-calendar"></i><?=$news->datetime?></li>
                        </ul>
                    </div>
                    <?= Html::img("@web/images/home/logo.png", ['alt' => '']) ?>
                    <br/>
                    <br/>
                    <p><?=$news->text?></p>
                    <div class="pager-area">
                        <div class="pager pull-right">
                            <a href="<?= \yii\helpers\Url::to(['category/news'])?>">Назад к списку новостей</a>
                        </div>
                    </div>
                </div>
            </div><!--/blog-post-area-->
        </div>
    </div>
</section>