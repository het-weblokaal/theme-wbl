<?php
use Theme_WBL\Utils;
?>

<button class="site-nav-toggle" aria-expanded="false">

    <span class="site-nav-toggle__label site-nav-toggle__label--open"><?= __('Menu', 'theme-wbl'); ?></span>
    <span class="site-nav-toggle__label site-nav-toggle__label--close"><?= __('Sluiten', 'theme-wbl'); ?></span>

    <span class="icon site-nav-toggle__icon site-nav-toggle__icon--open" aria-hidden="true" focusable="false">
        <?= Utils::svg('bars') ?>
    </span>

    <span class="icon site-nav-toggle__icon site-nav-toggle__icon--close" aria-hidden="true" focusable="false">
        <?= Utils::svg('times') ?>
    </span>

</button>
