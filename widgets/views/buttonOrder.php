<?php

use yii\helpers\Url;
use yii\web\View;

/** @var View $this */
/** @var int $countOrder */
/** @var int $countUser */
/** @var int $countGangster */
?>
<!--<a class="btn btn-primary order-count" data-pjax="1"  href="--><?//= Url::to(['/user/orders'])?><!--">Заказы (--><?//= $count?><!--)</a>-->
<a class="btn btn-primary" data-pjax="1"  href="<?= Url::to(['/user/orders'])?>">Заказы (<?= $countOrder?>)</a>
<p> Всего Users: <?= $countUser?></p>
<p> Всего Gangsters: <?= $countGangster?></p>

