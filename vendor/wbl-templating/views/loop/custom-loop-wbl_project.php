<?php

use ClimateCampus\App;
use function ClimateCampus\display_extra_loop_classes;
use function ClimateCampus\get_project_term;

$args = wp_parse_args( $args, [
	'posts_per_page' => 4,
	'post_type' => 'wbl_project',
	'post__not_in' => [ get_the_ID() ],
	'tax_query' => [
        [
            'taxonomy' => 'project_type',
            'field' => 'slug',
            'terms' => get_project_term('project_type')->slug ?? false,
        ]
    ],
]);

# Setup the query
$projects_query = new \WP_Query( $args );

# Setup second query if post count is under 4
$projects_query_2 = null;

if ($projects_query->post_count < 4 ) {

	# Fill posts until 4
	$args['posts_per_page'] = 4 - $projects_query->post_count;

	# Show posts without
	$args['tax_query'] = [
        [
            'taxonomy' => 'project_type',
            'field' => 'slug',
            'terms' => get_project_term('project_type')->slug ?? false,
            'operator' => 'NOT IN'
        ]
    ];

	$projects_query_2 = new \WP_Query( $args );
}

?>

<div class="loop loop--custom <?php display_extra_loop_classes([], $args['post_type']) ?>">
	<div class="loop__inner">

		<?php if ( ! $projects_query->have_posts() && ! ($projects_query_2 && $projects_query_2->have_posts()) ) : ?>

			<div class="entry entry--card entry--no-results"><div class="entry__main"><p><?= __('Geen resultaten', 'clc') ?></p></div></div>

		<?php else : ?>

			<?php if ($projects_query->have_posts()) : ?>

				<?php while ( $projects_query->have_posts() ) : $projects_query->the_post(); ?>

					<?php App::display_template( 'loop/entry', get_post_type() ); ?>

					<?php wp_reset_postdata(); ?>

				<?php endwhile; ?>

			<?php endif; ?>

			<?php if ($projects_query_2 && $projects_query_2->have_posts()) : ?>

				<?php while ( $projects_query_2->have_posts() ) : $projects_query_2->the_post(); ?>

					<?php App::display_template( 'loop/entry', get_post_type() ); ?>

					<?php wp_reset_postdata(); ?>

				<?php endwhile; ?>

			<?php endif; ?>

		<?php endif; ?>

	</div>
</div>

