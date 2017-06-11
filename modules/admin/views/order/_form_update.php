<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use dosamigos\datetimepicker\DateTimePicker;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'created_at')->textInput() ?>

    <?=$form->field($model, 'created_at')->textInput()->widget(DateTimePicker::className(), [
        'name' => 'created_at',
        'options' => ['placeholder' => ''],
        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'yyyy-MM-dd hh:mm:ss',//yyyy-M-d H:i:s
            'startDate' => $model->updated_at,
            'todayHighlight' => true,
        ]
    ]);?>

    <?=$form->field($model, 'updated_at')->textInput(['readonly'=>'readonly'])?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ '0' => 'Активен', '1' => 'Завершен', ]) //if we want to create empty field in our select ,['prompt' => '']?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
