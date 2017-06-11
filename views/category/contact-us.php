<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = "E-SHOPPER | Контакты";

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'сумки описание',
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'сумки ключевики',
]);
?>

<section>
    <div id="contact-page" class="container">
        <div class="bg">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="title text-center">На карте</h2>
                    <iframe width="100%" height="450" style="border: 0;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d180390.0089769944!2d38.87597255181532!3d45.05346237701023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40f04564714535b3%3A0xf720794f56c4beb6!2z0JrRgNCw0YHQvdC-0LTQsNGALCDQmtGA0LDRgdC90L7QtNCw0YDRgdC60LjQuSDQutGA0LDQuSwg0KDQvtGB0YHQuNGP!5e0!3m2!1sru!2s!4v1482098295414"
                            frameborder="0"></iframe>
                </div>
                <br class="clear">
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="contact-form">
                        <br/>
                        <h2 class="title text-center">Написать письмо</h2>

                        <?php if(Yii::$app->session->hasFlash('contactFormSubmitted')):?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo Yii::$app->session->getFlash('contactFormSubmitted');?>
                            </div>
                        <?php endif;?>
                        <?php if(Yii::$app->session->hasFlash('contactFormNotSubmitted')):?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo Yii::$app->session->getFlash('contactFormNotSubmitted');?>
                            </div>
                        <?php endif;?>

                        <!--<div class="status alert alert-success" style="display: none"></div>-->
                        <?php $form = ActiveForm::begin(['id' => 'main-contact-form', 'class' => 'contact-form row']); ?>
                        <div class="form-group col-md-6">
                            <?= $form->field($model, 'name')->textInput(['autofocus' => false, 'placeholder' => 'Имя*'])->label('') ?>
                        </div>
                        <div class="form-group col-md-6">
                            <?= $form->field($model, 'email')->textInput(['autofocus' => false, 'placeholder' => 'E-mail*'])->label('') ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?= $form->field($model, 'subject')->textInput(['autofocus' => false, 'placeholder' => 'Тема*'])->label('') ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?= $form->field($model, 'body')->textarea(['rows' => 6, 'placeholder' => 'Ваше сообщение*','id'=>'form-control-textarea'])->label('') ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?= $form->field($model, 'verifyCode')->label('')->widget(Captcha::className(), [
                                'template' =>
                                    '<div class="row"><div class="col-lg-3">{image}</div>
                                 <div class="col-lg-9">{input}</div></div>',
                                'options' => ['placeholder' => 'Проверочный код*', 'class' => 'form-control'],
                            ]) ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary pull-right', 'name' => 'contact-button']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>

                        <!--<form method="POST" enctype="multipart/form-data" action="" class="ajax contact-form row"
                       "="">
                       <input type="hidden" name="module" value="feedback">
                       <input type="hidden" name="action" value="add">
                       <input type="hidden" name="form_tag" value="feedback98f77fd55c8a657e42fd8f233b081fe5">
                       <input type="hidden" name="site_id" value="10">
                       <input type="hidden" name="tmpcode" value="3dde889723e33ace6af907cd5cc8e187">

                       <div class="form-group col-md-6 feedback1"><input type="text" name="p1" value=""
                                                                         class="form-control" placeholder="Имя*"
                                                                         required"="">
                       </div>
                       <div class="form-group col-md-6 feedback2">
                           <input type="email" name="p2" value="" class="form-control" placeholder="E-mail*" required"="">
                       </div>
                       <div class="form-group col-md-12 feedback6"><input type="text" name="p6" value=""
                                                                          class="form-control" placeholder="Тема*"
                                                                          required"="">
                       </div>
                       <div class="form-group col-md-12 feedback3"><textarea name="p3" cols="66" rows="10"
                                                                             class="form-control"
                                                                             placeholder="Ваше сообщение*" required"=""></textarea>
                       </div>
                       <div class="form-group col-md-12"><input type="submit" value="Отправить"
                                                                class="btn btn-primary pull-right"></div>
                       </form>-->
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="contact-info">
                        <br/>

                        <h2 class="title text-center">Контакты</h2>
                        <address>
                            <p>ООО "НИВИ"</p>

                            <p>255033, ул. Липатова 3/1</p>

                            <p>60614, NY</p>

                            <p>г. Краснодар</p>

                            <p>Mobile: ++7 (342) 782-08-30 / +7 950-944-63-69</p>

                            <p>Fax: 3-777-745-0123</p>

                            <p>Email: mail@gmail.com</p>
                        </address>
                        <div class="social-networks">
                            <h2 class="title text-center">МЫ В СОЦСЕТЯХ</h2>
                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/#contact-page-->
</section>
