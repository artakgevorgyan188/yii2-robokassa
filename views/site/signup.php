<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';//Login
$this->params['breadcrumbs'][] = $this->title;
?>
<?php //Yii::$app->getSecurity()->generatePasswordHash('505315vah');//will hash our password?>

<div class="site-login container">
    <?php if(Yii::$app->session->hasFlash('success')){?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success');?>
        </div>
        <a class="btn btn-default checkout" href="<?=\yii\helpers\Url::home()?>"><i class="fa fa-home" aria-hidden="true"></i> Вернуться на главную страницу</a>
        <br/><br/>
    <?php }else{?>
        <h1><?= Html::encode($this->title) ?></h1>

        <div class="signup-form">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]); ?>

            <?= $form->field($model, 'first_name')->textInput(['autofocus' => false]) ?>

            <?= $form->field($model, 'last_name')->textInput(['autofocus' => false]) ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => false]) ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => false]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    <?php }?>
    <?php if(Yii::$app->session->hasFlash('error')):?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error');?>
        </div>
    <?php endif;?>




</div>
