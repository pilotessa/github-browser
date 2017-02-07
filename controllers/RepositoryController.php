<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use Github\Client;
use RuntimeException;

class RepositoryController extends Controller
{
    /**
     * Displays the project details with the contributors list.
     *
     * @return string
     * @throws HttpException
     */
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $owner = $request->get('owner', Yii::$app->params['defaultRepositoryOwner']);
        $name = $request->get('name', Yii::$app->params['defaultRepositoryName']);

        try {
            $client = new Client();
            $repository = $client->api('repo')->show($owner, $name);
            $contributors = $client->api('repo')->contributors($owner, $name);
        } catch (RuntimeException $e) {
            throw new HttpException(404, $e->getMessage());
        }

        return $this->render('index', compact('repository', 'contributors'));
    }

    public function actionSearch()
    {
        return $this->render('search');
    }

}
