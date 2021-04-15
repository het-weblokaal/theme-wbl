<?php

use WBL\Theme\Template;
use function WBL\Theme\get_agenda_date;

$args = wp_parse_args( $args, [
	'icon' => true,
] );

$label = __( 'Datum', 'clc' );
$icon = ($args['icon']) ? Theme::svg('calendar') : false;
$date = get_agenda_date();

$content = wp_date('d M Y', strtotime($date));
$content = ($content) ? $content : '-';

?>

<div class="meta meta--agenda-date">
	<div class="meta__label"><?= $icon ?><span><?= $label ?></span></div>
	<div class="meta__content"><?= $content ?></div>
</div>

