<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'Login';
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?> 

            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
            Sign Up: <br />               
            <?= Html::a('<i class="fa fa-envelope"></i> Email',['site/signup_email'], ['class' => 'btn btn-default btn-sm', 'title' => 'Email']) ?>
            <?= Html::a('<i class="fa fa-facebook"></i> Facebook',['site/fb'], ['class' => 'btn btn-default btn-sm', 'title' => 'Facebook']) ?>
            <?= Html::a('<i class="fa fa-twitter"></i> Twitter',['site/twitter'], ['class' => 'btn btn-default btn-sm', 'title' => 'Twitter']) ?>
            <?= Html::a('<i class="fa fa-phone"></i> Phone',['site/signup'], ['class' => 'btn btn-default btn-sm', 'title' => 'Phone']) ?>            
            </div>            
        </div>        

    <?php ActiveForm::end(); ?>
</div>