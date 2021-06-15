<?php

namespace WBL\Theme;

$args = wp_parse_args( $args, [
	'label' => 'Onderwerpen',
	'link' => true,
	'class' => 'entry__categories'
] );

$categories = render_entry_terms( [ 
	'link'        => $args['link'],
	'taxonomy'    => 'category',
	'term_format' => '%s',
	'sep'         => ''
] );

?>

<div class="<?= $args['class'] ?>">

	<?php if ($args['label']) : ?>
		<span class="label"><?= $args['label'] ?></span>
	<?php endif; ?>

	<?= $categories ?>
	
</div>
