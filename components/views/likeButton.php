<?php

use yii\helpers\Html;
use yii\helpers\Url;

echo Html::a("", Url::to(['like/index', 'type' => $type, 'name' => $name]), ['class' => 'like']);
