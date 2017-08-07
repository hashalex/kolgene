<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Facebook';

?>
<div class="site-fb">
    <h1><?= Html::encode($this->title) ?></h1>
test <br />
123
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
              
              var provider = new firebase.auth.FacebookAuthProvider();
              
              
              
              firebase.auth().getRedirectResult().then(function(result) {
              if (result.credential) {
                // This gives you a Facebook Access Token. You can use it to access the Facebook API.
                var token = result.credential.accessToken;
                
                console.log('Success');
                
                console.log(result.user);
                // ...
              }
              // The signed-in user info.
              var user = result.user;
            }).catch(function(error) {
                
                console.log(error.code);
                
              // Handle Errors here.
              var errorCode = error.code;
              var errorMessage = error.message;
              // The email of the user's account used.
              var email = error.email;
              // The firebase.auth.AuthCredential type that was used.
              var credential = error.credential;
              // ...
            });
            
            if (typeof result !== 'undefined' ||  typeof error !== 'undefined') {
             
            } else {    
             firebase.auth().signInWithRedirect(provider);
            }

 </script>

</div>