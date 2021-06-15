<?php

namespace WBL\Theme;

$args = wp_parse_args( $args, [
	'label' => 'Auteur',
	'link' => false,
	'class' => 'entry__author',
] );

// Render author
$author = render_entry_author( [ 
	'link' => $args['link'],
] );

// Exit early
if ( ! $author ) { 
	return; 
}

?>

<div class="<?= $args['class'] ?>">

	<?php if ($args['label']) : ?>
		<span class="label"><?= $args['label'] ?></span>
	<?php endif; ?>

	<?= $author ?>
	
</div>