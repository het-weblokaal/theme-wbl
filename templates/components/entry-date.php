<?php

namespace WBL\Theme;

$args = wp_parse_args( $args, [
	'label' => 'Datum',
	'link' => false,
	'class' => 'entry__date',
] );

// Render date
$date = render_entry_date( [ ] );

// Exit early
if ( ! $date ) { 
	return; 
}

?>

<div class="<?= $args['class'] ?>">

	<?php if ($args['label']) : ?>
		<span class="label"><?= $args['label'] ?></span>
	<?php endif; ?>

	<?= $date ?>
	
</div>