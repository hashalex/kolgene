<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\SignUp */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

if ($type == 'email') $this->title = 'Sign Up Email';
elseif ($type == 'phone') $this->title = 'Sign Up Phone';

?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('signupSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for sign up.
        </div>
        

    <?php else: ?>

        <p>
            Please, fill all fileds.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

                   <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>                  

                   <?= $form->field($model, 'password')->passwordInput() ?>
                   
                   <?php if ($type == 'email'): ?>
                   <?= $form->field($model, 'email') ?>
                   <?php endif; ?>
                   
                   <?php if ($type == 'phone'): ?>
                   <?= $form->field($model, 'phone') ?>
                   
                   
                   <?= $form->field($model, 'sms_code')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{input}</div></div>',
                    ]) ?>
                    
                   <?php endif; ?>
                   

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Sign Up', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>                      
                        <?= Html::a( 'Back', 'index', ['class' => 'btn btn-primary', 'name' => 'back-button'] ); ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
