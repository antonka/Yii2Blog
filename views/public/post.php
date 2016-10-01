<?php

use yii\helpers\Html;
use yii\helpers\Markdown;

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    <p><i><?= Html::encode($created_at) ?></i></p>
    <div><?= Markdown::process($content); ?></div>
</div>