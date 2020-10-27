<?php

$menu_location = 'site-nav';

if ( has_nav_menu( $menu_location ) ) : ?>

    <nav class="site-nav">

        <h3 class="site-nav__title screen-reader-text">
            <?php Theme_WBL\get_menu_name_by_location( $menu_location ) ?>
        </h3>

        <?php wp_nav_menu( [
            'theme_location' => $menu_location,
            'container'      => '',
            'menu_id'        => '',
            'menu_class'     => 'site-nav__menu menu',
            'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
            'item_spacing'   => 'discard'
        ] ) ?>

    </nav>

<?php else : ?>

    <nav class="site-nav site-nav--no-menu">

        <ul class="site-nav__menu menu">
            <li class="menu__item"><span class="menu__link"><?= __('Menu not set yet', 'theme-wbl') ?></span></li>
        </ul>

    </nav>

<?php
endif;
