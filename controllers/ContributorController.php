<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\HttpException;
use Github\Client;
use RuntimeException;

class ContributorController extends Controller
{
    /**
     * Displays contributor details.
     *
     * @param $name
     * @return string
     * @throws HttpException
     */
    public function actionIndex($name)
    {
        try {
            $client = new Client();
            $contributor = $client->api('user')->show($name);
        } catch (RuntimeException $e) {
            throw new HttpException(400, $e->getMessage());
        }

        return $this->render('index', compact('contributor'));
    }

}
