<?php

use yii\helpers\Html;

$this->title = 'Load post';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div>
        <?= $this->render('_form', [
            'fileModel' => $fileModel,
            'postModel' => $postModel,
        ]); ?>
    </div>
</div>