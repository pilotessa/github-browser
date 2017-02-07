<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

Pjax::begin(['enablePushState' => false]);
echo Html::a("Like <span class=\"badge\">0</span>", '#', ['class' => 'like btn btn-primary btn-xs']);
Pjax::end();