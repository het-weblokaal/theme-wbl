<?php

use WBL\Theme\Template;
use function WBL\Theme\render_terms;

$args = wp_parse_args( $args, [
	'icon' => true,
	'link' => true,
	'taxonomy_id' => 'category'
] );

$label = __('Onderwerpen', 'clc');
$icon  = ($args['icon']) ? Theme::svg('tag') : false;
$terms = render_terms( $args['taxonomy_id'], ['link' => $args['link']] );

?>

<?php if ($terms) : ?>
	<div class="meta meta--categories">
		<span class="meta__label"><?= $icon ?><span><?= $label ?></span></span>
		<span class="meta__content"><?= $terms ?></span>
	</div>
<?php endif; ?>
