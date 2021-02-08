<?php

use app\models\Passport;
use app\models\User;

/** @var User $user */
?>

<?php if($user->passport):?>
    <?php  /** @var Passport $p */
    $p=$user->passport
    ?>
    <div class="panel-body">
        <ul>
            <li>
                серия: <?= $p->code?>
            </li>
            <li>
                номер: <?=$p->number?>
            </li>
            <li>
                адрес: <?=$p->address?>
            </li>
            <li>
                город: <?=$p->city?>
            </li>
        </ul>
    </div>
<?php endif;?>
