<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;

use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<nav>
	<?php if(Yii::$app->user->isGuest):?>
    <a href="/login/login">Вход</a>
    <a href="/login/registration">Регистрация</a>

    <?php else: ?>
    	 <a href="/login/logout">Выход</a>
	<?php endif;?>

</nav>
        <?= $content ?>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
