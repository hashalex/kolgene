<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Congratulation, '.$user_name.' you logged in!';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
      <img src="<?=Yii::$app->request->baseUrl?>/img/congratulation.jpg" border="0"/><br />
      <div class="form-group">
      <?=Html::beginForm(['/site/logout'], 'post')
        .Html::submitButton(
          'Logout',
          ['class' => 'btn btn-primary logout']
        )
        .Html::endForm();
        ?>
     </div>
    </p>
</div>
