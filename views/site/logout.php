<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

echo Html::beginForm(['/site/logout'], 'post')
. Html::submitButton(
  'Logout',
  ['class' => 'btn btn-link logout']
)
.Html::endForm();