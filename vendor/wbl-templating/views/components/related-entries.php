<?php
/**
 * Related entries
 */

use ClimateCampus\App;
use function ClimateCampus\get_post_type_archive_url;

# Setup args
$args = wp_parse_args( $args, [
	'post_type' => false,
] );

$post_type = ($args['post_type']) ? $args['post_type'] : get_post_type();

# Get Post Type object
$post_type_object = get_post_type_object( $post_type );

# Set labels
$post_type_name = $post_type_object->labels->name ?? null;
// $post_type_plural = $post_type_object->labels->view_items ?? null;

# Process labels :)
$post_type_name = strtolower($post_type_name);
// $post_type_plural = strtolower($post_type_plural);
// $post_type_plural = str_replace('view ', '', $post_type_plural);

?>

<div class="wp-block-group alignfull">
	<div class="wp-block-group__inner-container">

		<h2 class="has-text-align-center"><?= sprintf( _x('Onze %s', 'Gerelateerd', 'clc'), $post_type_name ); ?></h2>
		<p class="has-text-align-center"><a href="<?= get_post_type_archive_url() ?>" class="button is-style-button-link"><?= sprintf( _x('Bekijk onze %s', 'Gerelateerd', 'clc'), $post_type_name ); ?></a></p>

		<?php
		App::display_template( 'loop/custom-loop', $post_type, [
			'posts_per_page' => 4,
			'post_type' => $post_type,
			'post__not_in' => [ get_the_ID() ],
		] );
		?>

	</div>
</div>
