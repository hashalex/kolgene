<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Twitter authentication';

?>
<div class="site-fb">
    <h1><?= Html::encode($this->title) ?></h1>
    <div id="recaptcha-container"></div>
    
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

</div>