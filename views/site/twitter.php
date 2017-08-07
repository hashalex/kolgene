<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Twitter authentication';

?>
<div class="site-fb">
    <h1><?= Html::encode($this->title) ?></h1>

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
              
              var provider = new firebase.auth.TwitterAuthProvider();
              firebase.auth().signInWithPopup(provider).then(function(result) {
                  // This gives you a the Twitter OAuth 1.0 Access Token and Secret.
                  // You can use these server side with your app's credentials to access the Twitter API.
                  var token = result.credential.accessToken;
                  var secret = result.credential.secret;
                  // The signed-in user info.
                  var user = result.user;
                  console.log('yes!');
                  console.log(user);
                  console.log(user.o);
                  
                  //save user to mysql                 
                    $.ajax({
                        url: '<?php echo Yii::$app->request->baseUrl. '/site/add' ?>',
                       type: 'post',
                       data: {username: user.displayName  , email: user.email, 	firebase_user_id: user.uid, firebase_auth_token: token, method: 'twitter', _csrf : '<?=Yii::$app->request->getCsrfToken()?>' },
                       success: function (data) {
                          alert(data);
            
                       }
            
                  });
               
                  
                  
                }).catch(function(error) {
                  // Handle Errors here.
                  var errorCode = error.code;
                  var errorMessage = error.message;
                  // The email of the user's account used.
                  var email = error.email;
                  // The firebase.auth.AuthCredential type that was used.
                  var credential = error.credential;
                  // ...
                });

 </script>

</div>