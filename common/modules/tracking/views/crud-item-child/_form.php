<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\reporting\models\ItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-child-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_name')->textInput(['maxlength' => 75]) ?>

    <?= $form->field($model, 'child_name')->textInput(['maxlength' => 75]) ?>

    <?= $form->field($model, 'parent_type')->textInput() ?>

    <?= $form->field($model, 'child_type')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
