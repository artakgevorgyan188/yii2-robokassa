<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error container">

    <!--<h1><?php // Html::encode($this->title) ?></h1>-->

    <div class="container text-center">
        <div class="logo-404">
            <a href="<?=\yii\helpers\Url::home()?>"> <?= Html::img("@web/images/home/logo.png", ['alt' => '']) ?></a>
        </div>
        <div class="content-404">
            <?= Html::img("@web/images/404/404.png", ['alt' => '','class'=>'img-responsive']) ?>
            <h1><b>OPPS! </b><?= nl2br(Html::encode($message))?></h1>
            <p>Возможно текущая страница была удалена или адрес страницы был изменён.</p>
            <h2><a href="<?=\yii\helpers\Url::home()?>">Попробуйте вернуться на главную страницу</a></h2>
        </div>
    </div>
    <br/>


    <!--<div class="alert alert-danger">
        <?php //echo nl2br(Html::encode($message)) ?>
    </div>-->
    <?php //debug($exception)//in $exception object we will see many attributes,example [statusCode] -404, debug($name)-Not Found (#404),debug($message) -our message in controller?>
   <!-- <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>-->

</div>
<br/>
