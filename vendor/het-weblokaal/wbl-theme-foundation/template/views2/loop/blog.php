<?php 

namespace WBL\Theme;

// Setup custom query, or fallback to default query if no query arguments are passed
$query = ( $args['query_args'] ) ? new \WP_Query( $args['query_args'] ) : $GLOBALS['wp_query'];

// Add extra class if no posts
$args['extra_classes'] = ! $query->have_posts() ? 'loop--no-results' : [];

?>
<div class="loop loop--blog <?= html_classes( $args['extra_classes'] ) ?>" <?= html_attributes($args['attr']) ?>>
	<div class="loop__inner">

		<?php if ( $query->have_posts() ) : ?>

			<?php while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php Template::display( 'entry/blog', Template::entry_hierarchy() ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php Template::display( 'entry/blog/no-results' ); ?>
		
		<?php endif; ?>

		<?php wp_reset_postdata(); ?>

	</div>
</div>

<?php Template::display( 'components/loop-navigation' ); ?>
