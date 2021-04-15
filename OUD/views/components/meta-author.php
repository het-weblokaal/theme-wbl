<?php

// // Process template arguments
// $args = wp_parse_args($args, [
// 	'label' => '',
// ]);

$author = Theme_WBL\render_author( ['link' => false] );

?>

<?php if ($author) : ?>
	<div class="meta meta--author">
		<span class="meta__label">Auteur</span>
		<span class="meta__content"><?= $author ?></span>
	</div>
<?php endif; ?>
