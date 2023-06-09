<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

<<<<<<< HEAD
/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
=======
/** @var yii\web\View $this */
/** @var app\models\Article $model */
/** @var yii\widgets\ActiveForm $form */
?>

    <div class="article-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
>>>>>>> origin/main

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

<<<<<<< HEAD
    <?php ActiveForm::end(); ?>

</div>
=======
<?php ActiveForm::end(); ?>

    </div>
>>>>>>> origin/main
