<?php

use app\models\People;

/** @var People $owner */
?>

<h1><?= $owner->last_name?> :</h1>

<?=$this->render('_owner_property', [
    'owner' => $owner
])?>



