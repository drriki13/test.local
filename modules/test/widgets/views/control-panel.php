<?php

use yii\base\Model;
use yii\helpers\Url;

/** @var Model $model */

$array = explode("\\", get_class($model));
$className = mb_strtolower(end($array));
?>

<a href="<?= Url::toRoute([$className . '/view', 'id' => $model->id])?>" class="btn btn-success">Подробно</a>
<a href="<?= Url::toRoute([$className . '/update', 'id' => $model->id])?>" class="btn btn-primary">Редактировать</a>
<a href="<?= Url::toRoute([$className . '/delete', 'id' => $model->id])?>" class="btn btn-danger">Удалить</a>
