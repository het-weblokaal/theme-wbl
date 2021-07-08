<?php

namespace WBL\Theme;

$args = wp_parse_args( $args, [
	'label' => 'Onderwerpen',
	'link' => true,
	'taxonomy' => 'category',
] );

$terms = render_entry_terms( [ 
	'link'        => $args['link'],
	'taxonomy'    => $args['taxonomy'],
	'term_format' => '%s',
	'sep'         => ''
] );

?>

<div class="entry__terms entry__terms--<?= $args['taxonomy'] ?>">

	<?php if ($args['label']) : ?>
		<span class="label"><?= $args['label'] ?></span>
	<?php endif; ?>

	<div class="content">
		<?= $terms ?>
	</div>
	
</div>
