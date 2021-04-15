<?php

use ClimateCampus\App;
use function ClimateCampus\render_post_date;

$args = wp_parse_args( $args, [
	'icon' => true,
	'link' => true,
] );

$label = __('Datum', 'clc');
$icon  = ($args['icon']) ? App::svg('calendar') : false;
$date = render_post_date();

?>

<?php if ($date) : ?>
	<div class="meta meta--date">
		<span class="meta__label"><?= $icon ?><span><?= $label ?></span></span>
		<span class="meta__content"><?= $date ?></span>
	</div>
<?php endif; ?>

