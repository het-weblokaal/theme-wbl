<?php

use WBL\Theme\Template;
use function WBL\Theme\display_extra_loop_classes;

$args = wp_parse_args( $args, [
	'post_type' => 'post',
	'posts_per_page' => 3,
]);

// Setup the query
$custom_query = new \WP_Query( $args );

?>

<div class="loop loop--custom <?php display_extra_loop_classes([], $args['post_type']) ?>">
	<div class="loop__inner">

		<?php if ($custom_query->have_posts()) : ?>

			<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

				<?php Template::display( 'loop/entry', get_post_type() ); ?>

				<?php wp_reset_postdata(); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<div class="entry entry--card entry--no-results"><div class="entry__main"><p><?= __('Geen resultaten', 'clc') ?></p></div></div>

		<?php endif; ?>

	</div>
</div>
