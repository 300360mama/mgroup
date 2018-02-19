<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MgroupUser */
/* @var $form ActiveForm */
?>


    <?php $form = ActiveForm::begin(['id'=>'login', 'action'=>'/login/login']); ?>


        <?= $form->field($model, 'login') ?>
        <?= $form->field($model, 'password') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Ввойти', ['id'=>'submit']) ?>
        </div>
    <?php ActiveForm::end(); ?>


