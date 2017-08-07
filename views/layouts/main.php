<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title> 
            
    <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-messaging.js"></script>       
    <?php $this->head() ?>
</head>
<body>
<script>




</script>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Kolgene',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
   
    NavBar::end();
    ?>
    <div class="container">        
        <?= $content ?>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
