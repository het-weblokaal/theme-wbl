<?php
/**
 * Related entries
 */

namespace WBL\Theme;

$args = wp_parse_args( $args, [
	'query_args' => [
		'posts_per_page' => 4,
		'post_type' => 'post',
		'post__not_in' => [ get_the_ID() ],
	],
	'layout' => 'grid'
]);

$query = new \WP_Query( $args['query_args'] );

?>

<div class="related-entries alignwide <?= html_classes( $args['extra_classes'] ) ?>" <?= html_attributes($args['attr']) ?>>

	<?php if ( $query->have_posts() ) : ?>

		<div class="grid">

			<?php while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php Template::display( 'entry/grid', Template::entry_hierarchy() ); ?>

			<?php endwhile; ?>

		</div>

	<?php else : ?>
	
		<p>Geen entries gevonden</p>	

	<?php endif; ?>
	
</div>
