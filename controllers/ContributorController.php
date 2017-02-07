<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use Github\Client;
use RuntimeException;

class ContributorController extends Controller
{
    /**
     * Displays contributor details.
     *
     * @return string
     * @throws HttpException
     */
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $name = $request->get('name');

        try {
            $client = new Client();
            $contributor = $client->api('user')->show($name);
        } catch (RuntimeException $e) {
            throw new HttpException(404, $e->getMessage());
        }

        return $this->render('index', compact('contributor'));
    }

}
