<?php


use app\models\Car;
use app\models\People;

/** @var People $owner */
?>

<?php if($owner->cars):?>
    <?php  /** @var Car $cars */
    $cars=$owner->cars
    ?>
    <?php foreach ($cars as $car) :?>
        <div class="panel-body">
            <ul>
                <li>
                    Модель: <?= $car->brand?>
                </li>
                <li>
                    Марка: <?=$car->model?>
                </li>
            </ul>
        </div>
    <?php endforeach;?>
<?php endif;?>

