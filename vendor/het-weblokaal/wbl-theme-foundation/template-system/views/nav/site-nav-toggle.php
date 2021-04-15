<?php

use WBL\Theme\Template;

?>

<button class="site-nav-toggle" aria-expanded="false">

    <span class="site-nav-toggle__label site-nav-toggle__label--open"><?= __('Menu', 'clc'); ?></span>
    <span class="site-nav-toggle__label site-nav-toggle__label--close"><?= __('Sluiten', 'clc'); ?></span>

    <span class="icon site-nav-toggle__icon site-nav-toggle__icon--open" aria-hidden="true" focusable="false">
        <?= Theme::svg('bars') ?>
    </span>

    <span class="icon site-nav-toggle__icon site-nav-toggle__icon--close" aria-hidden="true" focusable="false">
        <?= Theme::svg('times') ?>
    </span>

</button>
