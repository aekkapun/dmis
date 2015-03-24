<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\tracking\models\search\Driver */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="driver-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Firstname') ?>

    <?= $form->field($model, 'Lastname') ?>

    <?= $form->field($model, 'Address') ?>

    <?= $form->field($model, 'Phonr') ?>

    <?= $form->field($model, 'IMEI') ?>

    <?php // echo $form->field($model, 'Gender') ?>

    <?php // echo $form->field($model, 'Ambulance_Number') ?>

    <?php // echo $form->field($model, 'id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
