<?php

use WBL\Templating\Template;
use function WBL\Templating\get_agenda_location;

$args = wp_parse_args( $args, [
	'icon' => true,
] );

$label = __( 'Locatie', 'clc' );
$icon = ($args['icon']) ? App::svg('map-marker-alt') : false;
$content = get_agenda_location();
$content = ($content) ? $content : '-';
?>

<div class="meta meta--agenda-location">
	<div class="meta__label"><?= $icon ?><span><?= $label ?></span></div>
	<div class="meta__content"><?= $content ?></div>
</div>

