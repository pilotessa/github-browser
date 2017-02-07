<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

echo Html::a("{$text} <span class=\"badge\">{$count}</span>", $link, ['class' => 'like btn btn-primary btn-xs' . ($disabled ? ' disabled' : '')]);
