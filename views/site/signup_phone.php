<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\SignUp */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
/*
Source: https://firebase.google.com/docs/auth/web/phone-auth
*/

$this->title = 'Sign Up Phone';
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>         
       <p>
          Please, fill all fileds.
       </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

                   <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>                  

                   <?= $form->field($model, 'password')->passwordInput() ?>  
                   
                  
                  
                  <div class="row">
                    <div class="col-lg-6"> <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [ 'mask' => '+999-99-9999-999',]) ?> </div>
                    <div class="col-lg-3" style="margin-top: 30px;"><?= Html::a( 'Send sms', '#', ['class' => 'btn btn-primary', 'name' => 'sms', 'id' => 'sign-in-button', 'onclick' => 'getSms()'] ); ?></div>
                  </div>                        
                    
                  <div class="row">
                    <div class="col-lg-3"><?= $form->field($model, 'sms_code') ?></div>
                    <div class="col-lg-6"></div>
                  </div>
                  
                    <div class="form-group">
                        <?= Html::a( 'Back', 'index', ['class' => 'btn btn-default', 'name' => 'back-button'] ); ?>
                        <?= Html::a( 'Sign Up', '#', ['class' => 'btn btn-primary', 'name' => 'sms', 'onclick' => 'smsConfirm()'] ); ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
          

        <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase.js"></script>
        <script>
        
            var config = {
                    apiKey: "<?=Yii::$app->params['fireBase']['apiKey']?>",
                    authDomain: "<?=Yii::$app->params['fireBase']['authDomain']?>",
                    databaseURL: "<?=Yii::$app->params['fireBase']['databaseURL']?>",
                    projectId: "<?=Yii::$app->params['fireBase']['projectId']?>",
                    storageBucket: "<?=Yii::$app->params['fireBase']['storageBucket']?>",
                    messagingSenderId: "<?=Yii::$app->params['fireBase']['messagingSenderId']?>"
                  };
                  firebase.initializeApp(config); 
                  
                window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('sign-in-button', {
                  'size': 'invisible',
                  'callback': function(response) {
                  }
                });                
        
        
            function getSms() {
                var phoneNumber = document.getElementById('signup-phone').value; //'+972528471703';
                var appVerifier = window.recaptchaVerifier;
                firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                    .then(function (confirmationResult) {
                        alert('SMS code sent to your number, please enter code to the confirmation filed.');
                      window.confirmationResult = confirmationResult;
                    }).catch(function (error) {
                      alert('Error! ' + error);
                    });
            }
        
                function smsConfirm() {
                    var code = document.getElementById('signup-sms_code').value;
                    confirmationResult.confirm(code).then(function (result) {
                     // User signed in successfully.
                     var user = result.user;
                     console.log(user);
                     var user_uid = user.uid;
                     var token = user.refreshToken;                
                     var phone_number = user.phoneNumber;
                     
                     console.log(user_uid);
                     console.log(token);
                     console.log(phone_number);
                                       
                     //save user to mysql                 
                     $.ajax({
                          url: '<?php echo Yii::$app->request->baseUrl. '/site/add' ?>',
                          type: 'post',
                          data: {username: '-', email: '-', phone: phone_number, firebase_user_id: user_uid, firebase_auth_token: token, method: 'phone', _csrf : '<?=Yii::$app->request->getCsrfToken()?>' },
                          success: function (data) {            
                          }            
                     });
                    }).catch(function (error) {
                      alert('Error! ' + error);
                    });
                }
            
        
         </script>        
         
                    
</div>
