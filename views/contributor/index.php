<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\components\LikeButtonWidget;

$this->title = !empty($contributor['name']) ? $contributor['name'] : $contributor['login'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-user">
    <?php if (!empty($contributor['name'])): ?>
        <h1><?= Html::encode($contributor['name']) ?></h1>
    <?php endif; ?>
    <p class="lead"><?= Html::encode($contributor['login']) ?></p>
    <div class="row">
        <div class="col-md-3">
            <?php if (!empty($contributor['avatar_url'])): ?>
                <p>
                    <?= Html::img($contributor['avatar_url'], ['class' => 'img-rounded img-responsive', 'alt' => $contributor['login']]) ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <?php if (!empty($contributor['company'])): ?>
                            <dt>Company</dt>
                            <dd><?= Html::encode($contributor['company']) ?></dd>
                        <?php endif; ?>
                        <?php if (!empty($contributor['blog'])): ?>
                            <dt>Blog</dt>
                            <dd>
                                <?= Html::a(Html::encode($contributor['blog']), $contributor['blog'], ['target' => '_blank']) ?>
                            </dd>
                        <?php endif; ?>
                        <?php if (!empty($contributor['followers'])): ?>
                            <dt>Followers</dt>
                            <dd><?= Html::encode($contributor['followers']) ?></dd>
                        <?php endif; ?>
                    </dl>
                </div>
                <div class="panel-footer text-right">
                    <?= LikeButtonWidget::widget() ?>
                </div>
            </div>
        </div>
    </div>
</div>