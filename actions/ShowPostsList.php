<?php

namespace app\actions;

use Yii;

/**
 * @author Anton Karamnov
 */
class ShowPostsList extends \yii\base\Action
{
    public function run()
    {
        return $this->controller->render('post_list.php');
    }
}