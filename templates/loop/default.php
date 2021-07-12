<?php 

namespace WBL\Theme;

// If we have query_args then setup a custom query, otherwise fallback to the default query
$query = ( isset($args['query_args']) ) ? new \WP_Query( $args['query_args'] ) : $GLOBALS['wp_query'];

?>

<?php if ( $query->have_posts() ) : ?>

	<div class="loop loop--<?= get_post_type() ?> <?= html_classes( $args['extra_classes'] ) ?>" <?= html_attributes($args['attr']) ?>>

		<ul>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>

			<li class="loop__entry entry">
				<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
			</li>

		<?php endwhile; ?>
		</ul>

	</div>

	<?php Template::display( 'components/loop-navigation' ); ?>

<?php else : ?>

	<?php Template::display( 'loop/no-results' ); ?>

<?php endif; ?>

<?php wp_reset_postdata(); ?>

