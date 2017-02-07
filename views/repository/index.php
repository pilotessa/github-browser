<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\components\LikeButtonWidget;

$this->title = $repository['full_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-project">
    <h1><?= Html::encode($repository['full_name']) ?></h1>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <?php if (!empty($repository['description'])): ?>
                            <dt>Description</dt>
                            <dd><?= Html::encode($repository['description']) ?></dd>
                        <?php endif; ?>
                        <?php if (!empty($repository['watchers'])): ?>
                            <dt>Watchers</dt>
                            <dd><?= Html::encode($repository['watchers']) ?></dd>
                        <?php endif; ?>
                        <?php if (!empty($repository['forks'])): ?>
                            <dt>Forks</dt>
                            <dd><?= Html::encode($repository['forks']) ?></dd>
                        <?php endif; ?>
                        <?php if (!empty($repository['open_issues'])): ?>
                            <dt>Open issues</dt>
                            <dd><?= Html::encode($repository['open_issues']) ?></dd>
                        <?php endif; ?>
                        <?php if (!empty($repository['homepage'])): ?>
                            <dt>Homepage</dt>
                            <dd>
                                <?= Html::a(Html::encode($repository['homepage']), $repository['homepage'], ['target' => '_blank']) ?>
                            </dd>
                        <?php endif; ?>
                        <?php if (!empty($repository['html_url'])): ?>
                            <dt>GitHub repo</dt>
                            <dd>
                                <?= Html::a(Html::encode($repository['html_url']), $repository['html_url'], ['target' => '_blank']) ?>
                            </dd>
                        <?php endif; ?>
                        <?php if (!empty($repository['created_at'])): ?>
                            <dt>Created at</dt>
                            <dd><?= Html::encode($repository['created_at']) ?></dd>
                        <?php endif; ?>
                    </dl>
                </div>
                <div class="panel-footer text-right">
                    <?= LikeButtonWidget::widget(['type' => 'repository', 'name' => $repository['full_name']]) ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <?php if (count($contributors)): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Contributors</h2>
                    </div>
                    <ul class="list-group">
                        <?php foreach ($contributors as $contributor): ?>
                            <li class="list-group-item">
                                <?= Html::a(Html::encode($contributor['login']), ['contributor/index', 'name' => $contributor['login']]) ?>
                                <span class="pull-right">
                                    <?= LikeButtonWidget::widget(['type' => 'contributor', 'name' => $contributor['login']]) ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
