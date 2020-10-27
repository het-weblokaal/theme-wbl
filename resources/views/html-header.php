<?php

use function Theme_WBL\render_attr as render_attr;
use function Theme_WBL\render_class as render_class;
use function Theme_WBL\get_html_attr as get_html_attr;

$html_attr  = render_attr( get_html_attr() );
$body_class = render_class( get_body_class() );

?>
<!doctype html>
<html <?= $html_attr ?>>

<head>
	<?php wp_head(); ?>
</head>

<body <?= $body_class ?>>
