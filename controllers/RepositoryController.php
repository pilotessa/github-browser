<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\HttpException;
use Github\Client;
use RuntimeException;

/**
 * Class RepositoryController
 * @package app\controllers
 */
class RepositoryController extends Controller
{
    /**
     * Displays the project details with the contributors list.
     *
     * @param $owner
     * @param $name
     * @return string
     * @throws HttpException
     */
    public function actionIndex($owner = 'yiisoft', $name = 'yii')
    {
        try {
            $client = new Client();
            $repository = $client->api('repo')->show($owner, $name);
            $contributors = $client->api('repo')->contributors($owner, $name);
        } catch (RuntimeException $e) {
            throw new HttpException(404, $e->getMessage());
        }

        return $this->render('index', compact('repository', 'contributors'));
    }

    /**
     * Searches repositories.
     *
     * @param $s
     * @return string
     * @throws HttpException
     */
    public function actionSearch($s)
    {
        try {
            $client = new Client();
            $repositories = $client->api('repo')->find($s)['repositories'];
        } catch (RuntimeException $e) {
            throw new HttpException(404, $e->getMessage());
        }

        return $this->render('search', compact('s', 'repositories'));
    }

}
