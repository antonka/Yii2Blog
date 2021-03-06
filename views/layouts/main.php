<?php

use Yii;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

$topNavItems = [];
if (!Yii::$app->user->isGuest) {
    
    $topNavItems[] = [
        'label' => Yii::t('app', 'Operation'),
        'items' => [
            [
                'label' => Yii::t('app', 'Load post'), 
                'url' => \blog\post\actions\Load::url(),
            ],
            [
                'label' => Yii::t('app', 'Add category'), 
                'url' => \blog\category\actions\Add::url(),
            ],
            \blog\comment\actions\ShowGrid::link(),
        ],
    ];
    
    $topNavItems[] = [
        'label' => Yii::$app->user->getIdentity()->name,
        'items' => [
            ['label' => Yii::t('user', 'Change profile'), 'url' => \blog\user\actions\ChangeProfile::url()],
            ['label' => Yii::t('user', 'Change password'), 'url' => \blog\user\actions\ChangePassword::url()],
            ['label' => Yii::t('app', 'Log out'), 'url' => \blog\user\actions\Logout::url()],
        ],
    ];
}

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->params['blog']['name'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-inverse navbar-fixed-top',],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $topNavItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) 
                ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
        <?= blog\base\widgets\AlertBlock::widget() ?> 
        
        <div class="row">
            <div class="col-sm-9">
                <?= $content ?>
            </div>
            <div class="col-sm-3">
                <?= \blog\category\widgets\CategoriesList::widget() ?>
            </div>
        </div>
    </div>
    
</div>

<footer class="footer" >
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                &copy; <?= Yii::$app->params['blog']['name'] . ' ' . date('Y') ?>
                <br>
                Powered by 
                <a href="https://github.com/antonka/Yii2Blog" rel="_blank" class="">Yii2blog</a>
            </div>
            <div class="col-sm-8">
                <?= Yii::$app->params['blog']['analitics'] ?>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
