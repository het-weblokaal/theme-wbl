<?php

use ClimateCampus\App;
use function ClimateCampus\get_agenda_time;

$args = wp_parse_args( $args, [
	'icon' => true,
] );

$label = __( 'Tijdstip', 'clc' );
$icon = ($args['icon']) ? App::svg('clock') : false;
$content = get_agenda_time();
$content = ($content) ? $content : '-';
?>

<div class="meta meta--agenda-time">
	<div class="meta__label"><?= $icon ?><span><?= $label ?></span></div>
	<div class="meta__content"><?= $content ?></div>
</div>

