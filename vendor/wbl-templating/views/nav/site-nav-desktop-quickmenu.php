<?php

use function ClimateCampus\get_menu_name_by_location;

$menu_location = 'site-nav-desktop-quickmenu';

if ( has_nav_menu( $menu_location ) ) : ?>

    <nav class="site-nav-desktop-quickmenu">

        <h3 class="site-nav-desktop-quickmenu__title screen-reader-text">
            <?php get_menu_name_by_location( $menu_location ) ?>
        </h3>

        <?php wp_nav_menu( [
            'theme_location' => $menu_location,
            'container'      => '',
            'menu_id'        => '',
            'menu_class'     => 'site-nav-desktop-quickmenu__menu menu',
            'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
            'item_spacing'   => 'discard'
        ] ) ?>

    </nav>

<?php else : ?>

    <nav class="site-nav-desktop-quickmenu site-nav--no-menu">

        <ul class="site-nav-desktop-quickmenu__menu menu">
            <li class="menu__item"><a class="menu__link" href="/"><?= __('Home', 'clc') ?></a></li>
        </ul>

    </nav>

<?php
endif;
