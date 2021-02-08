<?php

use app\models\Player;
use yii\web\View;

/** @var View $this */
/** @var string $message */
/** @var string $desc */
/** @var Player[] $players */
?>

<h1>Hello</h1>
<p><?= $message;?></p>
<p><?= $desc;?></p>

<?php foreach ($players as $player):?>
    <p>Имя: <?= $player->name?></p>
    <p>Команда: <?= $player->team->name?></p>
<?php endforeach;?>
