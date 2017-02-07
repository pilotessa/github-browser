<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\Like;

class LikeController extends Controller
{
    /**
     * Returns the like button html
     *
     * @param $type
     * @param $name
     * @return string
     */
    public function actionIndex($type, $name)
    {
        $count = Like::find()->where(['object_type' => $type, 'object_name' => $name])->count();

        if (Yii::$app->user->isGuest) {
            $text = 'Login to like';
            $link = '#';
            $disabled = true;
        } else {
            $like = Like::findOne(['user_id' => Yii::$app->user->getId(), 'object_type' => $type, 'object_name' => $name]);
            if ($like) {
                $text = 'Unlike';
                $link = Url::to(['like/delete', 'type' => $type, 'name' => $name]);
            } else {
                $text = 'Like';
                $link = Url::to(['like/add', 'type' => $type, 'name' => $name]);
            }
            $disabled = false;
        }

        return $this->renderPartial('index', compact('text', 'count', 'link', 'disabled'));
    }

    /**
     * Adds a like
     *
     * @param $type
     * @param $name
     * @return string
     */
    public function actionAdd($type, $name)
    {
        if (!Yii::$app->user->isGuest) {
            $like = Like::findOne(['user_id' => Yii::$app->user->getId(), 'object_type' => $type, 'object_name' => $name]);
            if (!$like) {
                $like = new Like;
                $like->user_id = Yii::$app->user->getId();
                $like->object_type = $type;
                $like->object_name = $name;
                $like->insert();
            }
        }

        return $this->actionIndex($type, $name);
    }

    /**
     * Removes a like
     *
     * @param $type
     * @param $name
     * @return string
     */
    public function actionDelete($type, $name)
    {
        if (!Yii::$app->user->isGuest) {
            $like = Like::findOne(['user_id' => Yii::$app->user->getId(), 'object_type' => $type, 'object_name' => $name]);
            if ($like) {
                $like->delete();
            }
        }

        return $this->actionIndex($type, $name);
    }

}
