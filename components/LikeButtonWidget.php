<?php

namespace app\components;

use yii\base\Widget;

class LikeButtonWidget extends Widget
{
    public function run()
    {
        return $this->render('likeButton');
    }
}