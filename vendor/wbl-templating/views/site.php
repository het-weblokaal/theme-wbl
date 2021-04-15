<?php

use ClimateCampus\App;

use function ClimateCampus\display_html_attributes;
use function ClimateCampus\display_body_classes;

?>
<!doctype html>
<html <?php display_html_attributes(); ?>>

<head>
	<?php wp_head(); ?>
</head>

<body class="site <?php display_body_classes(); ?>">
	<div class="site__inner">

<?php App::display_template( 'site-header' ) ?>

<?php App::display_template( 'site-main' ) ?>

<?php App::display_template( 'site-footer' ) ?>

	</div>

	<?php App::display_template( 'components/site-debug-info' ) ?>

	<?php wp_footer(); ?>
</body>

</html>
