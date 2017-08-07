<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = $type.' authentication';
?>
<div class="site-fb">
  <h1><?= Html::encode($this->title) ?></h1>

<?php 
if($type == 'Facebook' || $type == 'Twitter'): 
?>
<script src="https://www.gstatic.com/firebasejs/4.2.0/firebase.js"></script>
 <script>
       
              var config = {
                apiKey: "AIzaSyAsOn5HVZA-aeCNkpJyrdN19nI7lRoH488",
                authDomain: "kolgene-4db9e.firebaseapp.com",
                databaseURL: "https://kolgene-4db9e.firebaseio.com",
                projectId: "kolgene-4db9e",
                storageBucket: "kolgene-4db9e.appspot.com",
                messagingSenderId: "900382579951"
              };
              firebase.initializeApp(config); 
                         
              var provider = new firebase.auth.<?=$type?>AuthProvider();             
              firebase.auth().signInWithPopup(provider).then(function(result) {                 
                  var token = result.credential.accessToken;
                  var secret = result.credential.secret;                
                  var user = result.user;
                                   
                  //save user to mysql                 
                  $.ajax({
                        url: '<?php echo Yii::$app->request->baseUrl. '/site/add' ?>',
                       type: 'post',
                       data: {username: user.displayName, email: user.email, firebase_user_id: user.uid, firebase_auth_token: token, method: '<?=$type?>', _csrf : '<?=Yii::$app->request->getCsrfToken()?>' },
                       success: function (data) {            
                       }            
                  });
                  
                }).catch(function(error) {                
                  var errorCode = error.code;
                  var errorMessage = error.message;
                  var email = error.email;
                  var credential = error.credential;
                  alert(errorMessage + ' '.errorCode);
                });
 </script>
 <?php  else: ?>
<div>Opps! Something goes wrong! </div> 
<?php
 endif;
 ?>
</div>