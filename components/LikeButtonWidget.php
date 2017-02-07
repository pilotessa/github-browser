<?php

namespace app\components;

use yii\base\Widget;

class LikeButtonWidget extends Widget
{
    public $type;
    public $name;

    public function run()
    {
        if (!empty($this->type) && !empty($this->name)) {
            $result = $this->render('likeButton', ['type' => $this->type, 'name' => $this->name]);
        } else {
            $result = '';
        }

        return $result;
    }

}