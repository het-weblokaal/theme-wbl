<?php

use WBL\Templating\Template;
use function WBL\Templating\get_agenda_date;

$args = wp_parse_args( $args, [
	'icon' => true,
] );

$label = __( 'Datum', 'clc' );
$icon = ($args['icon']) ? App::svg('calendar') : false;
$date = get_agenda_date();

$content = wp_date('d M Y', strtotime($date));
$content = ($content) ? $content : '-';

?>

<div class="meta meta--agenda-date">
	<div class="meta__label"><?= $icon ?><span><?= $label ?></span></div>
	<div class="meta__content"><?= $content ?></div>
</div>

