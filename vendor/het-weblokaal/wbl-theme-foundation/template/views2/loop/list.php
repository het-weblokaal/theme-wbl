<?php 

namespace WBL\Theme;

// Setup custom query, or fallback to default query if no query arguments are passed
$query = ( $args['query_args'] ) ? new \WP_Query( $args['query_args'] ) : $GLOBALS['wp_query'];

// Add extra class if no posts
$args['extra_classes'] = ! $query->have_posts() ? 'loop--no-results' : [];

?>
<div class="loop loop--list <?= html_classes( $args['extra_classes'] ) ?>" <?= html_attributes($args['attr']) ?>>
	<div class="loop__inner">

		<?php if ( $query->have_posts() ) : ?>

			<?php display_loop( $query, 'entry/list', Template::entry_hierarchy() ); ?>

		<?php else : ?>

			<?php Template::display( 'entry/list/no-results' ); ?>
		
		<?php endif; ?>

	</div>
</div>

<?php Template::display( 'components/loop-navigation' ); ?>
