<?php
/**
 * Footer template functions
 */

namespace WBL\Templating;

function render_footer_menu_1() {
	return wp_nav_menu( [
            'theme_location' => 'site-footer-menu-1',
            'container'      => '',
            'menu_id'        => '',
            'menu_class'     => 'menu',
            'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
            'item_spacing'   => 'discard',
            'fallback_cb'    => false,
            'echo'           => false,
        ] );
}

function render_footer_menu_2() {
	return wp_nav_menu( [
            'theme_location' => 'site-footer-menu-2',
            'container'      => '',
            'menu_id'        => '',
            'menu_class'     => 'menu',
            'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
            'item_spacing'   => 'discard',
            'fallback_cb'    => false,
            'echo'           => false,
        ] );
}

function render_footer_content_1() {
	$content = get_footer_option( 'content_1' );

	remove_filter( 'the_content', 'wpautop' );
	$content = apply_filters( 'the_content', $content );
	add_filter( 'the_content', 'wpautop' );

	return $content;
}

function render_footer_content_2() {
	$content = get_footer_option( 'content_2' );

	// add_filter( 'the_content', 'shortcode_unautop' );

	remove_filter( 'the_content', 'wpautop' );
	$content = apply_filters( 'the_content', $content );
	add_filter( 'the_content', 'wpautop' );

	return $content;
}

function render_site_copyright( $args = [] ) {

    $args = wp_parse_args( $args, [
        'extra_classes' => '',
    ]);

	$copyright = get_footer_option( 'copyright');
    $copyright = apply_filters( 'the_content', $copyright );

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
