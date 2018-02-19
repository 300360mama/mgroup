<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;


$this->registerJsFile('/js/my.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<div class="wrapper">

    <div class="container">
        <div class="dateTask">
            <section class="dateInfo">
                <section class="dateTime">
                    <span class="day"><?=date('l H') ?>h</span>

                </section>
                <section class="mouth">
                    <?=date('F') ?>
                </section>
            </section>
            <section class="quantityTasks">
                <span><?=count($listTasks) ?></span>
                <i>Tasks</i>
            </section>
            <div class="add" id="addTask_form">
                <i class="fa fa-plus-circle"></i>
            </div>
        </div>
        <div class="listTasks">
            <?php require_once 'listTasks.php'?>

        </div>


        <div class="addTask ">
            <?php $form = ActiveForm::begin(['id'=>'add_form', 'action'=>'/tasks/add']); ?>

            <?= $form->field($tasks, 'text_task') ?>
            <?= $form->field($tasks, 'date_task')->input('datetime-local') ?>




            <div class="form-group">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'type'=>'submit','id'=>'task_add']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>


</div>