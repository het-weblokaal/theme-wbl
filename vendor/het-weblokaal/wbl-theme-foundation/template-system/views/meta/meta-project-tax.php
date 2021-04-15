<?php

use WBL\Theme\Template;
use function WBL\Theme\render_project_taxonomy_icon;
use function WBL\Theme\render_terms;

$args = wp_parse_args( $args, [
	'icon' => true,
	'link' => true,
	'taxonomy_id' => '',
] );

# Only proceed with taxonomy_id
if ( !$args['taxonomy_id'] ) {
	return;
}

$label = get_taxonomy($args['taxonomy_id'])->labels->singular_name ?? '';
$icon = ($args['icon']) ? render_project_taxonomy_icon( $args['taxonomy_id'] ) : false;
$terms = render_terms( $args['taxonomy_id'], [ 'link' => $args['link'] ] );

?>

<div class="meta meta--<?= $args['taxonomy_id'] ?>">
	<div class="meta__label"><?= $icon ?><span><?= $label ?></span></div>
	<div class="meta__content"><?= $terms ?></div>
</div>

