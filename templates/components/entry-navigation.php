<?php

namespace WBL\Theme;

/**
 * Navigation between single entries
 */

$previous_link = get_previous_post_link( '%link' );
$next_link     = get_next_post_link( '%link' );

// Exit if we don't have a previous or next link
if ( ! $previous_link && ! $next_link ) {
	return;
}

$class_modifier = '';

if ( ! $previous_link ) {
	$class_modifier = 'entry-navigation--first-entry';
}
elseif ( ! $next_link ) {
	$class_modifier = 'entry-navigation--last-entry';
}

?>
<nav class="entry-navigation <?= $class_modifier ?> <?= html_classes( $args['extra_classes'] ) ?>" <?= html_attributes($args['attr']) ?> role="navigation">
	<h2 class="screen-reader-text"><?= __( 'Bericht navigatie', 'wbl-theme' ) ?></h2>

	<div class="entry-navigation__links">

		<?php if ( $previous_link ) : ?>

			<div class="entry-navigation__previous">
				<div class="entry-navigation__link-label"><?= __( 'Vorig bericht', 'wbl-theme' ) ?></div>
				<?= $previous_link ?>
			</div>

		<?php endif ;?>

		<?php if ( $next_link ) : ?>

			<div class="entry-navigation__next">
				<div class="entry-navigation__link-label"><?= __( 'Volgend bericht', 'wbl-theme' ) ?></div>
				<?= $next_link ?>
			</div>

		<?php endif ;?>

	</div>
</nav>
