<?php 

namespace WBL\Theme;

$args = wp_parse_args( $args, [
	'query' => [],
	'extra_classes' => []
] );

// Use custom or global query
$query = ( $args['query'] ) ? new \WP_Query( $args['query'] ) : $GLOBALS['wp_query'];

// Add extra class if no posts
$args['extra_classes'] = ! $query->have_posts() ? 'loop--no-results' : [];

?>
<div class="loop loop--blog <?= html_classes( $args['extra_classes'] ) ?>">
	<div class="loop__inner">

		<?php 

		if ( $query->have_posts() ) {

			while ( $query->have_posts() ) {
				$query->the_post();

				Template::display( 'entry/blog', Template::entry_hierarchy() );

				// Reset postdata if this is a custom query
				if ( ! $query->is_main_query() ) {
					$query->reset_postdata();
				}
			}
		}
		else {
			Template::display( 'entry/blog/no-results' );
		}

		?>

	</div>
</div>

<?php if ( $query->have_posts() ) : ?>

	<?php Template::display( 'components/loop-navigation' ); ?>

<?php endif; ?>
