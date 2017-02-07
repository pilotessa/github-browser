<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\components\LikeButtonWidget;

$this->title = 'Search';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-search">
    <h1>For search term "<?= Html::encode($s) ?>" found</h1>
    <?php if (count($repositories)) { ?>
        <?php foreach ($repositories as $repository): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="list-inline">
                        <li>
                            <h2 class="panel-title">
                                <?= Html::a(Html::encode($repository['owner']) . '/' . $repository['name'], ['repository/index', 'owner' => $repository['owner'], 'name' => $repository['name']]) ?>
                            </h2>
                        </li>
                        <?php if (!empty($repository['homepage'])): ?>
                            <li>
                                <?= Html::a(Html::encode($repository['homepage']), $repository['homepage'], ['target' => '_blank']) ?>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($repository['username'])): ?>
                            <li>
                                <?= Html::a(Html::encode($repository['username']), ['contributor/index', 'name' => $repository['username']]) ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
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
                    </dl>
                </div>
                <div class="panel-footer text-right">
                    <?= LikeButtonWidget::widget() ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } elseif (empty($s)) { ?>
        <p>No search term specified.</p>
    <?php } else { ?>
        <p>No results.</p>
    <?php } ?>
</div>