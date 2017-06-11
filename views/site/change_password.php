<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\ResetPasswordForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Изменение пароля';//Reset password-

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'сумки описание',//$category->keywords if in db has field description
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'сумки ключевики',//$category->description if in db has field keywords
]);
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login container">
    <div class="site-request-password-reset login-form">
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
        <div class="site-reset-password login-form">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Пожалуйста, выберите новый пароль:</p><!--Please choose your new password:-->

            <div class="row">
                <div class="col-lg-5">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?><!--reset-password-form-->

                    <?= $form->field($user, 'currentPassword')->passwordInput(['autofocus' => false]) ?>
                    <?= $form->field($user, 'newPassword')->passwordInput(['autofocus' => false]) ?>
                    <?= $form->field($user, 'confirmPassword')->passwordInput(['autofocus' => false]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>