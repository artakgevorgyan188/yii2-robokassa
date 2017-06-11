<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
use app\assets\ltAppAsset;
use app\models\SearchForm;

AppAsset::register($this);//register for css and js with AppAsset class
ltAppAsset::register($this);//register for css and js with AppAsset class

$q = trim(Yii::$app->getRequest()->getQueryParam('q'));
$q = Html::encode($q);
$model = new SearchForm();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!--we can write not in ltAppAsset-->
    <?php /*$this->registerJsFile('js/html5shiv.js',['position' => \yii\web\View::POS_HEAD,'condition' => 'lte IE9']);
          $this->registerJsFile('js/respond.min.js',['position' => \yii\web\View::POS_HEAD,'condition' => 'lte IE9']);*/ ?>

    <!--<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon"/>-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">

    <!--<link rel="shortcut icon" href="images/ico/favicon.ico">-->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->
<body>

<?php $this->beginBody() ?>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-1"><!--col-sm-4-->
                    <div class="logo pull-left">
                        <a href="<?= \yii\helpers\Url::home() ?>"><?= Html::img("@web/images/home/logo.png", ['alt' => 'E-SHOPPER']) ?></a>
                    </div>
                    <!--<div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>-->
                </div>
                <div class="col-sm-11"><!--col-sm-8-->
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php if (!Yii::$app->user->isGuest): ?>
                                <li><a href="<?= Url::to(['/site/logout']) ?>"><i
                                            class="fa fa-user"></i> <?= Yii::$app->user->identity['username'] ?> (Выход)</a>
                                </li>
                            <?php endif; ?>
                            <li><a href="#"><i class="fa fa-star"></i> Закладки</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['cart/view']) ?>"><i class="fa fa-crosshairs"></i>
                                    Оформить заказ</a></li>
                            <li><a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart"></i> Корзина <span
                                        id="count-product"><?php if (!empty($_SESSION['cart.qty'])) {
                                            echo $_SESSION['cart.qty'];
                                        } else {
                                            echo '0';
                                        } ?></span></a></li>
                            <?php if (Yii::$app->user->isGuest): ?>
                                <!--<li><a href="<?php // Url::to(['/admin']) ?>"><i class="fa fa-lock"></i> Вход</a></li>-->
                                <li><a href="<?= Url::to(['/site/login-user']) ?>"><i class="fa fa-lock"></i> Вход</a></li>
                                <li><a href="<?= Url::to(['/site/signup']) ?>"><i class="fa fa-user"></i> Регистрация</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-10">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Переключение навигации</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?= \yii\helpers\Url::home() ?>">Главная</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['category/about']) ?>">О нас</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['category/delivery-and-payment']) ?>">Оплата и доставка</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['category/return-product']) ?>">Возврат</a></li>
                            <!--Возврат и обмен-->
                            <li><a href="<?= \yii\helpers\Url::to(['category/discount']) ?>">Акции</a></li>
                            <!--Акции и скидки-->
                            <li><a href="<?= \yii\helpers\Url::to(['category/reviews']) ?>">Отзывы</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['category/news']) ?>">Новости</a></li>
                            <!--<li class="dropdown"><a href="#">Блог<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Список блогов</a></li>
                                    <li><a href="blog-single.html">Блог одноместные</a></li>
                                </ul>
                            </li>-->
                            <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?= \yii\helpers\Url::home() ?>">Каталог товаров</a></li>
                                    <li><a href="<?= \yii\helpers\Url::to(['cart/view']) ?>">Оформить заказ</a></li>
                                    <li><a href="#" onclick="return getCart()">Корзина</a></li>
                                    <li><a href="<?= Url::to(['/site/login-user']) ?>">Вход</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= \yii\helpers\Url::to(['category/contact-us']) ?>">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                </div>
                <div class="span12 search_box pull-right">
                    <form class="form-search form-horizontal pull-right" method="get"
                          action="<?= Url::to(['category/search']) ?>">
                        <div class="input-append span12">
                            <input type="text" id="input-search" class="search-query" placeholder="Поиск"
                                   name="q" value="<?php echo $q; ?>">
                            <button id="search_button" type="submit" class="btn"><span
                                    class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
</header>
<!--/header-->

<?= $content; ?>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="/images/home/iframe1.png" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                            <p>Circle of Hands</p>

                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="/images/home/iframe2.png" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                            <p>Circle of Hands</p>

                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="/images/home/iframe3.png" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                            <p>Circle of Hands</p>

                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="/images/home/iframe4.png" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                            <p>Circle of Hands</p>

                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="/images/home/map.png" alt=""/>

                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Обслуживание</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Онлайн помощь</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['category/career']) ?>">Контакты</a></li>
                            <li><a href="#">Статус заказа</a></li>
                            <li><a href="#">Изменить местоположение</a></li>
                            <li><a href="#">Часто задаваемые вопросы</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Быстрый магазин</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Футболка</a></li>
                            <li><a href="#">Мужской</a></li>
                            <li><a href="#">Женский</a></li>
                            <li><a href="#">Подарочные карты</a></li>
                            <li><a href="#">Обувь</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>О компании</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?= \yii\helpers\Url::to(['category/about']) ?>">О нас</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['category/delivery-and-payment']) ?>">Оплата и доставка</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['category/career']) ?>">Карьера</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['category/contact-us']) ?>">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Гарантии качества</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?= \yii\helpers\Url::to(['category/discount']) ?>">Акции и скидки</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['category/return-product']) ?>">Возврат и обмен</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['category/terms-of-use']) ?>">Условия использования</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>Подписка</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Ваш email адрес"/>
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i>
                            </button>
                            <p>Подпишитесь на нашу рассылку и получайте информацию о специальных предложениях и акциях...</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2016 E-SHOPPER Inc. All rights reserved.</p>

                <p class="pull-right">Designed by <span><a target="_blank"
                                                           href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer>
<!--/Footer-->

<?php Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'cart',//default id w0
    'size' => 'modal-lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                 <a href="' . Url::to(['cart/view']) . '" class="btn btn-success">Оформить заказ</a>
                 <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>'
]);

Modal::end(); ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
