<?php

$menu_location = 'site-nav-secondary';

if ( has_nav_menu( $menu_location ) ) : ?>

    <nav class="site-nav-secondary">

        <h3 class="site-nav__title screen-reader-text">
            <?php ClimateCampus\get_menu_name_by_location( $menu_location ) ?>
        </h3>

        <?php wp_nav_menu( [
            'theme_location' => $menu_location,
            'container'      => '',
            'menu_id'        => '',
            'menu_class'     => 'site-nav-secondary__menu menu',
            'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
            'item_spacing'   => 'discard'
        ] ) ?>

    </nav>

<?php
endif;
