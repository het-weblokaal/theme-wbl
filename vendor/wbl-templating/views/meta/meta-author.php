<?php

use WBL\Templating\Template;
use function WBL\Templating\render_author;

return false;

$args = wp_parse_args( $args, [
	'icon' => true,
	'link' => true,
] );

$label  = __('Auteur', 'clc');
$icon   = ($args['icon']) ? App::svg('user') : false;
$author = render_author( ['link' => false] );

?>

<?php if ($author) : ?>
	<div class="meta meta--author">
		<span class="meta__label"><?= $icon ?><span><?= $label ?></span></span>
		<span class="meta__content"><?= $author ?></span>
	</div>
<?php endif; ?>
