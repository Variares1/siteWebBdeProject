<?php
foreach ($events as $event): ?>
<h2><?= $event->title() ?></h2>
<time><?= $event->date() ?></time>
<?php endforeach; ?>
