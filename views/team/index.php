<?php

use app\models\Passport;
use app\models\Player;
use app\models\Team;

/** @var Team[] $teams */

?>
<h1>View for user/index</h1>

<div class="container">
    <div class="row">
        <?php foreach ($teams as $team) : ?>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul>
                            <li>
                                имя команды: <?= $team->name ?>
                            </li>
                        </ul>
                    </div>
                    <?php if ($team->players): ?>
                        <?php /** @var Player $players */
                        $players = $team->players;
                        ?>
                        <?php /** @var Player $p */
                        foreach ($players as $p) :?>
                            <div class="panel-body">
                                <ul>
                                    <li>
                                        имя: <?= $p->name ?>
                                    </li>
                                    <li>
                                        возраст: <?= $p->age ?>
                                    </li>
                                    <li>
                                        рейтинг: <?= $p->rating ?>
                                    </li>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>