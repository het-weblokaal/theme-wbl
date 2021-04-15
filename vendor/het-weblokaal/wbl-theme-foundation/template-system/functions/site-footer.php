<?php
/**
 * Footer template functions
 */

namespace WBL\Theme;

function render_site_copyright( $args = [] ) {

    $args = wp_parse_args( $args, [
        'extra_classes' => '',
    ]);

	$copyright = Theme::get_name();

    ob_start();
    ?>

    <div class="site-copyright <?= $args['extra_classes'] ?>">
        <?= $copyright ?>
    </div>

    <?php
    return ob_get_clean();
}

function display_site_copyright( $args = [] ) {

    echo render_site_copyright($args);
}
