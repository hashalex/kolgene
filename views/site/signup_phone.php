<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\SignUp */

/*
Source: https://firebase.google.com/docs/auth/web/phone-auth
*/

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Sign Up Phone';
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    
        <p>
            Under construction... <br /><br />
            Source: <a href="https://firebase.google.com/docs/auth/web/phone-auth">https://firebase.google.com/docs/auth/web/phone-auth</a>
        </p>
        
        

        <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase.js"></script>
        <script>
                      // Initialize Firebase
                      var config = {
                        apiKey: "AIzaSyAsOn5HVZA-aeCNkpJyrdN19nI7lRoH488",
                        authDomain: "kolgene-4db9e.firebaseapp.com",
                        databaseURL: "https://kolgene-4db9e.firebaseio.com",
                        projectId: "kolgene-4db9e",
                        storageBucket: "kolgene-4db9e.appspot.com",
                        messagingSenderId: "900382579951"
                      };
                      firebase.initializeApp(config);
                      
                      window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('sign-in-button', {
                          'size': 'invisible',
                          'callback': function(response) {
                            // reCAPTCHA solved, allow signInWithPhoneNumber.
                            onSignInSubmit();
                          }
                        });
                    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
                      
                      window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
                      'size': 'normal',
                      'callback': function(response) {
                        grecaptcha.reset(widgetId);
                      },
                      'expired-callback': function() {
                        // Response expired. Ask user to solve reCAPTCHA again.
                        // ...
                      }
                    });
                    
                    var phoneNumber = getPhoneNumberFromUserInput();
                    var appVerifier = window.recaptchaVerifier;
                    firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                        .then(function (confirmationResult) {
                          // SMS sent. Prompt user to type the code from the message, then sign the
                          // user in with confirmationResult.confirm(code).
                          window.confirmationResult = confirmationResult;
                        }).catch(function (error) {
                          // Error; SMS not sent
                          // ...
                        });
            
        
         </script>
         
         <div class="form-group">
            <?= Html::a( 'Back', 'index', ['class' => 'btn btn-default', 'name' => 'back-button'] ); ?>
         </div>
                    
</div>
