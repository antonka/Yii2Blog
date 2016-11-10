<?php

use yii\helpers\Html;
use yii\helpers\Markdown;

$this->title = $post->title;
$this->params['breadcrumbs'][] = $this->title;

?>

<?= \app\widgets\PostToolbar::widget(['postId' => $post->id]); ?>

<div class="site-about"> 
    <p><i><?= Html::encode($post->created_at) ?></i></p>
    <div><?= Markdown::process($post->content) ?></div>
</div>