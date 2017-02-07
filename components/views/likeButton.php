<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

Pjax::begin(['enablePushState' => false]);
echo Html::beginTag('div', ['class' => 'likeButtonPlaceholder', 'data-type' => $type, 'data-name' => $name]);
echo Html::endTag('div');
Pjax::end();